<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assignment extends CI_Model {
	public function get_all_assignments(){
        $query = "SELECT * FROM assignments ORDER BY assignments.id";
        // $values = array(intval($limit));
        return $this->db->query($query)->result_array();
    }
    // get the assgnments from database based on the filtered
    public function filter_assignments($data){
        if($data['assignments'] == 'introduction' ){
            $data['assignments'] = '';
        }
        $query = "SELECT * FROM assignments WHERE level IN (?,?) AND track LIKE (?)";
        return $this->db->query($query, array(($data['easy']), ($data['intermediate']), "%" . $data['assignments']))->result_array();
    }
}   