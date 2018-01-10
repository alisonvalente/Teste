<?php

Class UserDao extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    /**
     * @return Object User
     */
    public function get($id)
    {
    	$this->db->select('*');
		$this->db->from('User');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return $this->user->initialize(
				$query->result()[0]->id,
				$query->result()[0]->name,
				$query->result()[0]->email,
				$query->result()[0]->password
			);
		}
		else
		{
			return false;
		}
    }

    /**
     * @return Array dados do usuario
     */
    public function find_by_id($id)
    {
    	$this->db->select('User.*');
		$this->db->from('User');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return [
				"id" 		=> $query->result()[0]->id,
				"name" 		=> $query->result()[0]->name,
				"email" 	=> $query->result()[0]->email,
				"password" 	=> $query->result()[0]->password
			];
		}
		else
		{
			return false;
		}
    }

    
    /**
     * @return Array [user_id, user_name]
     */
	public function find_by_login($email, $password)
	{
		$this->db->select('id, name');
		$this->db->from('User');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return [
				"user_id" 	=> $query->result()[0]->id,
				"user_name" => $query->result()[0]->name
			];
		}
		else
		{
			return false;
		}
	}

	public function insert(User $user)
	{
		$user->setId(NULL);
		$this->db->insert('User', $user);
	}

	public function update(User $user)
	{
		$this->db->where('id', $user->getId());
		$this->db->update('User', $user);
	}
}
?>
