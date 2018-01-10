<?php

class Register extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('userdao','',TRUE);
        $this->load->model('user','',TRUE);
    }

    public function index()
    {
        //validation
        $this->form_validation->set_rules('name', 'Nome', 'trim|required|min_length[3]|max_length[20]'
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Senha', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Confirmação de Senha', 'trim|required|matches[password]'
         );

        if(TRUE === $this->form_validation->run())
        {
            $user = $this->user->initialize(
                NULL,
                $this->input->post('name'),
                $this->input->post('email'),
                do_hash($this->input->post('password'))
            );

            //insert
            $this->userdao->insert($user);
            $this->session->set_flashdata([
                'type'    => 'success',
                'message' => 'Usuário criado com sucesso.',
            ]);

            redirect("Welcome");
        }

        $this->load->view('register');
    }

    public function resetpassword()
    {
        check_session();
        //validation
        $this->form_validation->set_rules('password', 'Senha atual', 'trim|required|callback_check_database'
        );
        $this->form_validation->set_rules('newpassword', 'Senha', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Confirmação de Senha', 'trim|required|matches[newpassword]'
         );

        if(TRUE === $this->form_validation->run())
        {
            $user = $this->get_user();
            $user->setPassword(do_hash($this->input->post('newpassword')));

            //update
            $this->userdao->update($user);
            $this->session->set_flashdata([
                'type'    => 'success',
                'message' => 'Usuário criado com sucesso.',
            ]);

            redirect("Welcome");
        }
        $this->load->view('reset-password');
    }

    public function check_database($password) {
        $user = $this->get_user();

        if($user->getPassword() == do_hash($password)) {
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Senha inválida');

            return false;
        }
    }

    private function get_user()
    {
        $userId = get_user_id();
        $user = $this->userdao->get($userId);

        return $user;
    }
}
?>