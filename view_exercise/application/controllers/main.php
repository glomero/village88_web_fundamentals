<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');


    class Main extends CI_Controller{
        public function world(){
            $this->load->view('main/world');
        }
        // public function ninjas(){
        //     $this->load->view('main/ninjas');
        // }

        public function ninjas($number){
            $this->load->view('main/ninjas', $number);
            $this->session->userdata('times', $number); //Set it up so that accessing "/main/ninjas/number", loads the same ninjas.php as a view file but where it shows the number of ninjas specified in the url. For example, visiting "/main/ninjas/35" should display 35 Ninja pictures. It can display the same image multiple times.
        }
        
    }
?>