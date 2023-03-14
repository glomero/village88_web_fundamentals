<?php 
    class Billings extends CI_Controller{
        //view monthly charges 
        public function index(){
            if($this->session->flashdata() == Null){
                $this->load->model('Billing');
                $total_charges = $this->Billing->total_charges('2011-01-01', '2011-12-31');
                // var_dump($total_charges);
                // die();
            }else{
                $date1 = $this->session->flashdata('date1');
                $date2 = $this->session->flashdata('date2');
                $this->load->model('Billing');
                $total_charges = $this->Billing->total_charges($date1, $date2);
            }
            $this->load->view('index', array('total_charges' => $total_charges));
        }
        public function process(){
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            $this->session->set_flashdata('date1', $date1);
            $this->session->set_flashdata('date2', $date2);
            redirect('/');
        }
    }
?>