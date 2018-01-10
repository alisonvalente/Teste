<?php

Class PostDao extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('post','',TRUE);
    }

    /**
     * @return Array
     */
    public function fetch()
    {
    	$this->db->select('Post.*, User.name usrName');
		$this->db->from('Post');
		$this->db->join('User', 'Post.usrId = User.id');
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();

		$posts = [];
		foreach($query->result() as $row)
		{
			$posts[] = [
				"id" 		  => $row->id,
				"title" 	  => $row->title,
				"description" => $row->description,
				"usrId" 	  => $row->usrId,
				"usrName" 	  => $row->usrName,
			];
		}

		return $posts;
    }

    /**
     * @return Object Post
     */
    public function find_by_id($id)
    {
    	$this->db->select('*');
		$this->db->from('Post');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			$row = $query->result()[0];
			$post = new Post();

			return $post->initialize(
				$row->id,
				$row->usrId,
				$row->title,
				$row->description
			);
		}
		else
		{
			return false;
		}
    }

	public function insert(Post $post)
	{
		$post->setId(NULL);

		return $this->db->insert('Post', $post);
	}

	public function update(Post $post)
	{
		var_dump($post);
		$this->db->where('id', $post->getId());

		return $this->db->update('Post', $post);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('Post');
	}
}
?>
