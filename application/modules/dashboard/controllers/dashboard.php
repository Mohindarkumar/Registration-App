<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');       
        $this->load->database();
        $this->load->library("session");
    }

    public function index()
    {
        $this->load->view('dashboard');
    }

}