<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    //loads the login view
    public function main()
    {
        $this->load->view('main');
    }
    //processes the user registration
    public function register()
    {
        $this->load->model('User');
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "First Name", "trim|required");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required|exact_length[11]|numeric');
        $this->form_validation->set_rules("password", "Password", "min_length[8]|required");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "matches[password]|required");
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("/");
        } else {

            $this->session->set_flashdata("register_success", "Registration Successful!");
            $this->User->register_user();
            redirect("/");
        }

    }
    public function login() //login

    {
        $this->load->model('User');
        $contact = $this->input->post('contact_number');
        $password = md5($this->input->post('password'));
        $users = $this->User->get_user_by_contacts($contact);
        // echo "$password<br>";
        // echo $users['password'];
        if ($users['contact_number'] !== $contact || $users['password'] !== $password) {
            $this->session->set_flashdata("login_error", "Invalid contacts or password!");
            // Insert the failed login attempt time into the database
            $this->db->insert('users', [
                'contact_number' => $contact,
                'login_fail' => date('Y-m-d H:i:s'),
            ]);
            redirect("/");
        } else {
            $user = array(
                'users_id' => $users['id'],
                'users_contact' => $users['contact_number'],
                'users_first_name' => $users['first_name'],
                'users_last_name' => $users['last_name'],
                'users_email' => $users['email'],
                'users_name' => $users['first_name'] . ' ' . $users['last_name'],
                'is_logged_in' => true
            );
            $this->session->set_userdata($user);
            // $this->load->view("/Users/profile");
            redirect("Users/profile");
        }
    }
    //simple profile page of a users
    public function profile()
    {
        if ($this->session->userdata('is_logged_in') === TRUE) {
            $this->load->view('profile');
        } else {
            redirect("/");
        }
    }
    //logout the users
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("/");
    }
}
