<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); 
    }

    public function index() 
    {
        $data['title'] = 'Login ';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE)
		{
            $this->load->view('auth/login', $data);
		}else{
			$this->_login();
		}
    }

    private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if($user) {
			if(password_verify($password, $user['password'])) { 
				$data = [
					'username' => $user['username'],
					'level' => $user['level'],
					'nama' => $user['nama'],
					'id' => $user['id'],
				];
				$this->session->set_userdata($data);
				if($user['level'] == 'Admin' ) {
					redirect(base_url('Dashboard'));
				}
			}else{
				$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
 			 Password Salah !</div>');
        		redirect(base_url('AuthController'));
			}
		}else{
			$this->session->set_flashdata('notif', '<div class="alert alert-danger" role="alert">
 			 Username Salah !</div>');
        	redirect(base_url('AuthController'));
		}
	}

    public function daftar() 
    {
        $data['title'] = 'Daftar ';

        $this->load->view('auth/daftar', $data);
		
    }



}
