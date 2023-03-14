<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Order');
	}
	public function index_html(){
		$result['orders'] = $this->Order->fetch_all();
		$this->load->view('partials/orders', $result);
	}
	public function create(){
		$new_order = $this->input->post();
		$this->Order->create($new_order);
		$result['orders'] = $this->Order->fetch_all();
		$this->load->view('partials/orders', $result);
	}
	public function index(){
		$this->load->view('index');
	}
}
