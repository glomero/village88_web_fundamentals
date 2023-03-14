<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Raffles extends CI_Controller{
        public function main(){ //count the number visited in the website
            $counter = $this->session->userdata('counter');
            $counter++;
            $this->session->set_userdata('counter', $counter);
            $this->load->view('main');
        }
        public function mainClose(){
            $this->load->library('session');
            if($this->session->userdata('counter')!== 1){
                //destroy session
                $this->session->sess_destroy('counter');
            }
        }
    }
?>