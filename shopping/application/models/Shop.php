<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    date_default_timezone_set('Asia/Manila');

    class Shop extends CI_Model{
        public function get_all_products(){
            return $this->db->query('SELECT * FROM products')->result_array();
            
        }
        public function add_order($order){ //bill
            $query = "INSERT INTO orders (order_amount, customer_name, address, card_number, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
            
            $values = array($order['total'], $order['name'], $order['address'], $order['card_num']);
            return $this->db->query($query, $values);
        }
        public function get_last_id(){
            return $this->db->insert_id();
        }
        public function add_order_items($item){
            $query = 'INSERT INTO order_details (order_id, product_id, qty, amount, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())';
            
            $values = array($item['order_id'], $item['id'], $item['qty'], $item['total']);
            // var_dump($values);
            // die();
            $this->db->query($query, $values);
            
        }
        public function remove($remove){
            $query = "DELETE FROM order_details WHERE product_id = $remove";
            return $this->db->query($query);
        }
    }
?>