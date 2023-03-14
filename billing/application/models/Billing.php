<?php 
    class Billing extends CI_Model{
        //show the charges
        public function total_charges($date1, $date2){
            $query = "SELECT MONTHNAME(charged_datetime) as month, YEAR(charged_datetime) as year, SUM(amount) as total_cost FROM billing WHERE YEAR(charged_datetime) = 2011 GROUP BY month";
            $values  =array($date1, $date2);
            return $this->db->query($query, $values)->result_array();
        }
        
    }
?>