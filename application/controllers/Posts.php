<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller 
{
	public function __construct() 
    {
        parent::__construct();
        check_session();
        $this->load->model('post','',TRUE);
        $this->load->model('postdao','',TRUE);
    	//force_ssl();
    }

	public function index()
    {
        $data["posts"] = $this->postdao->fetch();

		$this->load->view('posts', $data);
	}
    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Descrição', 'required');

        if(TRUE === $this->form_validation->run())
        {
            $post = $this->post->initialize(
                NULL,
                get_user_id(),
                $this->input->post('title'),
                $this->input->post('description')
            );

            $this->postdao->insert($post);
            $this->session->set_flashdata([
                'type'    => 'success',
                'message' => 'Post criado com sucesso.',
            ]);

            redirect("Posts");
        }

        $this->load->view('post-create');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Descrição', 'required');

        if(TRUE === $this->form_validation->run())
        {
            $post = $this->postdao->find_by_id($id);
            if ($post->getUsrId() != get_user_id()) {
                    return false;
            }

            $post->setTitle($this->input->post('title'));
            $post->setDescription($this->input->post('description'));

            $this->postdao->update($post);
            $this->session->set_flashdata([
                'type'    => 'success',
                'message' => 'Post alterado com sucesso.',
            ]);

            redirect("Posts");
        }

        $post = $this->postdao->find_by_id($id);

        $this->load->view('post-edit', [
            'id'          => $post->getId(),
            'title'       => $post->getTitle(),
            'description' => $post->getDescription(),
        ]);
    }

    public function delete($id)
    {
        if ($this->postdao->find_by_id($id)->getUsrId() != get_user_id()) {
                return false;
        }

        $this->postdao->delete($id);

        redirect("Posts");
    }
}
