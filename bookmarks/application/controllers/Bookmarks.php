<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks extends CI_Controller
{
	public function __construct()
	{ //using contructs for the methods, also load the bookmark model and form helpers
		parent::__construct();
		$this->load->model('Bookmark');
		$this->load->helper(array('form', 'url'));

	}
	public function main()
	{ //This display all the bookmarks
		$this->load->model('Bookmark');
		$bookmarks_data['details'] = $this->Bookmark->get_bookmark();
		$this->load->view('/main', $bookmarks_data);
	}
	public function add(){ //handle submission 
		$this->load->model('Bookmark');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required'); //validtion for the form
		$this->form_validation->set_rules('url', 'url', 'required');
		$this->form_validation->set_rules('folder', 'folder', 'required');

		if ($this->form_validation->run() == false){ //show the form again if  error
			// echo "error";
			redirect('Bookmarks/main');
			

		} else { // saving bookmarks and go to main
			$this->Bookmark->set_bookmark();
			
			// $this->load->view('/bookmarks');
			redirect('Bookmarks/main');

		}

	}
	public function delete($id){
		$this->load->model('Bookmark');
		$this->Bookmark->delete_bookmark($id);
		redirect('Bookmarks');
	}
	public function destroy($id){ //destroy page and confirmation
		$this->load->model('Bookmark');
		$bookmarks_data['details'] = $this->Bookmark->get_data_bookmark($id);
		$this->load->view('/destroy', $bookmarks_data);
	}
	

}