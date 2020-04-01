<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Registers');
        $this->load->database();
        $this->load->library("session");
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function addUser()
    {
    	$this->load->helper(array('file'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');
        }
        else
        {
        	$config['upload_path']          = './userimage/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 102048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('profileimage'))
            {
                     
                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('register', $error);               
            }
            else
            {
                $upload_data = $this->upload->data(); 
  				$file_name   = $upload_data['file_name'];
  				$password    = $this->input->post('password');
  				$password    = md5($password);

  				$insertData = array(
  					'name'	=> $this->input->post('name'),
  					'email'	=> $this->input->post('email'),
  					'password'	=> $password,
  					'profileimage'	=> $file_name
  				);

  				$data = $this->Registers->insertUser($insertData);

  				$this->session->set_flashdata('success', $data);
      			$this->load->view('register');
            }

        }

    	
    }
}