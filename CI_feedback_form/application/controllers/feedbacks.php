<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Feedbacks extends CI_Controller{
        public function main(){
            $this->load->view('main');
        }
        public function result(){
        $postData = $this->input->post();
        $this->session->set_userdata($postData);
        $this->load->view('/result');
        }
    }
?>

