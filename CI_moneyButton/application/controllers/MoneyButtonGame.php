<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MoneyButtonGame extends CI_Controller {
		public function main(){
			if($this->session->userdata('money') == 0){
				$this->session->set_userdata('money', 500);
			}
			if($this->session->userdata('chances') == 0){
				$this->session->set_userdata('chances', 10);
			}
			if($this->session->userdata('datas') == null){
				$this->session->set_userdata('datas', array());
			}
			$this->load->view('main');
		}
		public function risk(){
			$risk_level = array(
					"Low Risk" => array(-25, 100),
					"Moderate Risk" => array(-100, 1000),
					"High Risk" => array(-500, 2500),
					"Severe Risk" => array(-3000, 5000)

			);
			$result = $risk_level[$this->input->post('action')][rand(0, 1)];
			$datas = $this->session->userdata('datas');
			$money = $this->session->userdata('money');
			$chances = $this->session->userdata('chances');
			$chances--;
			$money += $result;
			$date = date('m/d/y h:i A');
			//textlog condition
			if($result > 0){
				$gamehost = "<p class='green'>[$date] You pushed {$this->input->post('risk')}. Value is $result. Your current money now is $money with $chances chance(s) left.</p>"; 
			}else{
				$gamehost= "<p class='red'>[$date] You pushed {$this->input->post('risk')}. Value is $result. Your current money now is $money with $chances chance(s) left.</p>";
			}
		
			$datas[] = $gamehost; //if the chances is 0 message a Game Over!
			if($chances == 0 || $money <= 0){
				$datas[] = '<p>Game Over!</p>';
			}
			$this->session->set_userdata('datas', $datas);
			$this->session->set_userdata('money', $money);
			$this->session->set_userdata('chances', $chances);
			redirect('/');
		}
		public function reset(){
			$this->session->sess_destroy();
			redirect('/');
		}
}	
