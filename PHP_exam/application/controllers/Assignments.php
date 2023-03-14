<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assignments extends CI_Controller {	
	public function index()
	{
		$this->load->model('Assignment');
		$assignments['assignments'] = $this->Assignment->get_all_assignments();
		$this->load->view('index', $assignments);
	}
	//load the all assignments from the database
	public function main(){
		$this->load->model('Assignments');
		$assignments['assignments'] = $this->Assignments->get_all_assignments();
		$this->load->view('list', $assignments);
	}
	//this fucntion load filter of the assignments
	public function filter(){
		$data = array(
			'easy' => $this->input->post('easy'),
			'intermediate' => $this->input->post('intermediate'),
			'assignments' => $this->input->post('assignments')
			);
			$this->load->model('Assignment');
			$assignments['assignments']  = $this->Assignment->filter_assignments($data);
			$this->load->view('list', $assignments);
	}
}
