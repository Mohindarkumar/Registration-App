<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('Logins');
        $this->load->database();
        $this->load->library("session");
  }

  public function index()
  {
    $this->load->view('login');
  }
   
  public function userCheck()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_emails|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('login');
    }
    else
    {
      $getData = array(            
         'email' => $this->input->post('email')
      );

      $data = $this->Logins->getuserDetails($getData);

      foreach ($data as $value)
      {
        $name     = $value['name'];
        $email    = $value['email'];
        $password = $value['password'];
        $profileimage = $value['profileimage'];
      }

      $useremail    = $this->input->post('email');
      $userpassword = $this->input->post('password');
      $userpassword = md5($userpassword);

      if ($userpassword == $password && $useremail == $email)
      {
        $sessionData = array(
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
            'profileimage' => $profileimage,
        );

        $this->session->set_userdata($sessionData);
        redirect(site_url('dashboard/index'));
      }
      else
      {
        $this->session->set_flashdata('error', 'email or password is incorrect!');
        $this->load->view('login');
      }
    }
  }

  public function logout($value='')
  {
    $this->session->sess_destroy();
    $this->load->view('login');
  }

}