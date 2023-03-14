<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Order extends CI_Model {
    public function fetch_all()
    {
        return $this->db->query("SELECT * FROM orders")->result_array();
    }
    public function create($new_order)
    {
        $query = "INSERT INTO orders (description) VALUES (?)";
        $values = array($new_order['description']);
        return $this->db->query($query, $values);
    }
}