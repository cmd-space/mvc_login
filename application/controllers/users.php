<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
  public function index()
  {
  	$this->output->enable_profiler(TRUE);
    $this->load->model('User');
    $data_array = array(
    				'login_errors' => $this->session->flashdata('login_errors'),
    				'register_errors' => $this->session->flashdata('register_errors')
    			  );
    $this->load->view('welcomes/index', $data_array);
  }

  public function login()
  {
  	$this->output->enable_profiler(TRUE);
  	$this->load->model('User');
  	if($this->input->post('login') == 'submit')
  	{
  		$email = $this->input->post('email');
  		$is_email = $this->User->login($email);
  		if(!isset($is_email['email']))
  		{
  			$this->session->set_flashdata('login_errors', 'Incorrect Email and/or Password');
			redirect('/');  			
  		}
  		elseif($this->input->post('password') != $is_email['password'])
  		{
  			$this->session->set_flashdata('login_errors', 'Incorrect Email and/or Password');
  			redirect('/');
  		}
  		else
  		{
  			$user = array(
  						'first_name' => $is_email['first_name'],
  						'last_name' => $is_email['last_name'],
  						'email' => $is_email['email']
  					);
  			$this->load->view('login/welcome', $user);
  		}
  	}
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha');
  	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha');
  	$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required|is_unique[users.email]');
  	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
  	$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|required|matches[password]');
  	if($this->input->post('register') == 'submit')
  	{
	  	if($this->form_validation->run() === FALSE)
	  	{
	  		$this->session->set_flashdata('register_errors', validation_errors());
	  		redirect('/');
	  	}
	  	else
	  	{
	  		$user = array('first_name' => $this->input->post('first_name'),
	  					  'last_name' => $this->input->post('last_name'),
	  					  'email' => $this->input->post('email'),
	  					  'password' => $this->input->post('password')
	  				);
	  		$this->User->add_user($user);
	  		// $this->load->view('login/welcome', $user);
	  		$id = $this->db->insert_id();
	  		redirect('users/show/'.$id);
	  	}
  	}	
  }

  public function show($id)
  {
  	$this->load->model('User');
  	$data = $this->User->find($id);
  	$this->load->view('login/welcome', $data);
  }

  public function logout()
  {
  	$this->session->sess_destroy();
  	redirect('/');
  }
}

//end of main controller
