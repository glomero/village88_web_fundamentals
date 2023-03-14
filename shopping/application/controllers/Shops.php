<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	date_default_timezone_set('Asia/Manila');

	class Shops extends CI_Controller {
		public function index(){
				if(!empty($this->session->userdata('cart'))){
				$this->load->model('Shop');
				$all_products = $this->Shop->get_all_products();
				$data = array('records' =>$all_products, 'cart' => $this->session->userdata('cart'));
				$this->load->view('index', $data);
			}else{
				$this->load->model('Shop');
				$this->session->set_userdata('cart', 0);
				$this->session->set_userdata('total', 0);
				$all_products = $this->Shop->get_all_products();

				if(!empty($all_product)){
					foreach($all_products as $key => $value){
						$this->session->set_userdata($value['name'], 0);
					}
				}
				$data = array('records' => $all_products, 'cart' => $this->session->userdata('cart'));
				$this->load->view('index', $data);
			}
		}
		public function buy(){
			// $this->output->enable_profiler(true);
			$this->load->model('Shop');
			$all_products = $this->Shop->get_all_products();
			$post_len = 0;
			foreach($all_products as $key => $value){
				$post_len += strlen($this->input->post($value['name']));
			}
			
			if(!empty($this->input->post()) && $post_len != 0){
				foreach($all_products as $key => $value){
					if(!empty($this->input->post($value['name']))){
						$item = $this->session->userdata($value['name']);
						$item += $this->input->post($value['name']);
						$this->session->set_userdata($value['name'], $item);
						$added_qty = $this->input->post($value['name']);
						$cart = $this->add_to_cart($added_qty);
						$this->load->model('Shop');
						$all_products = $this->Shop->get_all_products();
						$data = array('records' => $all_products, 'cart' => $cart);
						$this->load->view('index', $data);
					}
				}
			}else{
				redirect('/');
			}
		}
		public function add_to_cart($qty){
			$this->load->model('Shop');
			$cart = $this->session->userdata('cart');
			$cart += $qty;
			$this->session->set_userdata('cart', $cart);
			return $this->session->userdata('cart');
		}
		public function cart(){
			$this->load->model('Shop');
			$all_products = $this->Shop->get_all_products();
			// var_dump($all_products);
			// die();
			$total = 0;
			$cart = 0;
			foreach($all_products as $key => $value){
				$total += $this->session->userdata($value['name']) * $value['price'];
				$cart += $this->session->userdata($value['name']);
				// var_dump($this->session->userdata());
				// die();
			}
			$this->session->set_userdata('total', $total);
			$this->session->set_userdata('cart', $cart);

			$header= array('Item name', 'Qty', 'Price', 'Amt', 'Action');
			$orders = array();
			$total_item = 0;
			foreach($all_products as $key => $value){
				$nameqty = $this->session->userdata($value['name']);
				$price = intval($value['price']);
				// var_dump($price);
				// die();
				$total_item = $nameqty * $price;
				// var_dump($total_item);
				// die();
				if($total_item != 0 ){
					array_push($orders, array('item_name' => $value['name'], 'qty' => $this->session->userdata($value['name']), 'price' => $value['price'], 'amt' => $total_item, 'id' => $value));
				}
			}
			$this->session->set_userdata('orders',$orders);
			$data = array('header' => $header, 'orders' => $orders, 'total' => $total);
			$this->load->view('catalog', $data);
		}
		public function remove($tag){
			$this->load->model('Shop');
			$this->Shop->remove($tag);
			$all_products = $this->Shop->get_all_products();
			if(!empty($all_products)){
				foreach($all_products as $key => $value){
					if($value['id'] == $tag){
						$this->session->set_userdata($value['name'], 0);
					}
				}
			}
			redirect('cart');
		}
		public function bill(){
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$card_num = $this->input->post('card_num');
			$total = $this->session->userdata('total');
			$bill = array('bill' => $this->input->post(), 'total' => $total, 'name' => $name, 'address' => $address, 'card_num' => $card_num);
			// var_dump($bill);
			// die();
			$this->load->model('Shop');
			$add_order = $this->Shop->add_order($bill);
			if($add_order == true){
				$last_id = $this->Shop->get_last_id();
				$items = $this->session->userdata('orders');

				foreach($items as $key => $value){
					foreach($items[$key] as $idx => $val){
						if($idx == 'qty') $qty = $val;
						if($idx == 'id') $id = $val;
						if($idx == 'amount') $total= $val;
					}
					
					$item = array('order_id' => $last_id, 'id' => $id, 'qty' => $qty, 'total' => $total);
					// var_dump($item);
					// die();
					$this->Shop->add_order_items($item);
				}
				$message = 'Order Successfully submitted. We will send you the Billing in your Address. Thank you!';
				$this->session->set_flashdata('message', $message);
				$this->load->model('Shop');
				$all_products = $this->Shop->get_all_products();
				if(!empty($all_products)){
					foreach($all_products as $key => $value){
						$this->session->set_userdata($value['name'], 0);
					}
				}
				redirect('cart');
			}
		}
	}
