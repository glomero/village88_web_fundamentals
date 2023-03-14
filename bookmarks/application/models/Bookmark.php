<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Bookmark extends CI_Model{
        // public function __construct(){ // load the database
        //     $this->load->database();
        // }
        public function set_bookmark(){ //new bookamrk will be inserted
            $this->load->database();
            $bookmark_data = array(
                        'folder' => $this->input->post('folder'),
                        'name' => $this->input->post('name'),
                        'url' => $this->input->post('url'),
                        'created_at' => date('Y-m-d'),
                        'updated' => date('Y-m-d')
            );
            return $this->db->insert('details', $bookmark_data);
            
        }
        public function get_bookmark(){ // this will get all the bookmarks from database
            $this->load->database();
            $this->db->order_by('created_at');
            $query = $this->db->get('details');
            return $query->result_array();
        }
        public function get_data_bookmark($id){ //getting bookmarks by id
            $this->load->database();
            $query = $this->db->get_where('details', array('id' => $id));
            return $query->row_array();

        }
        public function delete_bookmark($id){ // delete bookmarks by id
            $this->load->database();
            $this->db->where('id', $id);
            return $this->db->delete('details');
        }
    }
?>