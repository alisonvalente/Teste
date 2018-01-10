<?php

function check_session()
{
	$ci=& get_instance();
	$uri = strtolower($ci->uri->segment(1));

	// se esta logado
	if ($ci->session->userdata('logged_in'))
	{
		// se esta na home
		if (in_array($uri, array("welcome","")))
		{
			redirect('posts','refresh');
		}
	}
	else
	{
		// nao esta na home
		if ($uri != "welcome")
		{
			redirect('welcome','refresh');
		}

	}
}

function get_user_id()
{
	$ci=& get_instance();
	if ($ci->session->userdata('logged_in')) {
		return $ci->session->userdata('logged_in')['user_id'];
	}

	return false;
}

?>