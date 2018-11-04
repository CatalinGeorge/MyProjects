<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();

							 $this->load->helper('url_helper');
							 $this->load->model('account_model');
							 $this->load->helper('form');
							 $this->load->library('form_validation');
							 $this->load->library('session');
			 }

	public function index()
	{
		$this->load->view('login_view');
	}

	public function register()
	{
		$this->load->view('register_view');
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
    redirect('home');
	}

  public function create()
  {
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('name', 'username', 'required');
      $this->form_validation->set_rules('pass', 'Password', 'required');

      if ($this->form_validation->run() === FALSE)
      {

      }
      else
      {
          $this->account_model->set_user();
          redirect('home');
      }
  }



public function login()
  {
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('pass', 'Password', 'required');

      if ($this->form_validation->run() === FALSE)
      {

      }
      else
      {

      if($this->account_model->login_user()) {
          $this->session->user = $this->account_model->login_user();
            if($this->session->user['us_email'] === 'admin@mail.com') {
              redirect('admin');
            } else {
              redirect('home');
            }
          } else {
            $this->session->user = false;
            redirect('account');
          }
      }
  }





















}
