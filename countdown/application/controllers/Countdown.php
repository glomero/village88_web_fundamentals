<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Countdown extends CI_Controller{
        public function main(){
            date_default_timezone_set('Asia/Manila');
            $current_date = date('F d, Y');
            // $NextDay = strtotime('NextDay');
            // $seconds = time() - $NextDay ;
            $TimeData = array(
                'current_date' => $current_date,
                'seconds' => (mktime(24,0,0) - time())
            );
            $this->load->view('countdown', $TimeData);
        }
    }
?>