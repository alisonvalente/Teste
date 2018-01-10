<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{
	public function __construct() {
        parent::__construct();
        $this->load->model('userdao','',TRUE);
    	//force_ssl();
    }

	public function index() {
        check_session();
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if(TRUE === $this->form_validation->run()) {
            //Go to private area
            redirect('posts', 'refresh');
        }

		$this->load->view('welcome');
	}

	public function check_database($password) {
        $email = $this->input->post('email');

        //query the database
        $res = $this->userdao->find_by_login($email, do_hash($password));

        if($res) {
            $this->session->set_userdata('logged_in', $res);

            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Usuário ou senha inválidos');

            return false;
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('welcome', 'refresh');
    }
}
