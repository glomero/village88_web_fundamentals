<?php
    class User extends CI_Model {
        function get_user_by_contacts($contact)
        { 
            $query = 'SELECT * FROM users WHERE contact_number = ?';
            $values = array($contact);
            return $this->db->query($query, $values)->row_array();
        }
        function register_user()
        {   
            $firstName = $this->input->post('first_name');
            $lastName = $this->input->post('last_name');
            $email = $this->input->post('email');
            $contact = $this->input->post('contact_number');
            $password = md5($this->input->post('password'));
            $this->load->database();

            $user = array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'contact_number' => $contact,
                'password' => $password,
                'created_at' => date("Y-m-d, H:i:s"),
                'updated_at' => date("Y-m-d, H:i:s")
            );
            
            $query = "INSERT INTO users (first_name, last_name, email, contact_number, password, created_at, updated_at) VALUES ('$firstName','$lastName', '$email', '$contact','$password',NOW(),NOW())";
            $values = array($user['first_name'], $user['last_name'], $user['email'], $user['contact_number'], $user['password'], $user['created_at'], $user['updated_at']);
            return $this->db->query($query, $values);
        }
    }

?>