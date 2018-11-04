<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('account_model');
								$this->load->helper('url_helper');
								$this->load->library('session');
								$this->load->helper('form');
							 	$this->load->library('form_validation');
							 	$this->load->helper('url_helper');

        }

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('account_view');
	}

	public function login_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
					$this->load->view('account_view');
        }
        else
        {
			  if($this->account_model->login_user()) {
					  $this->session->user = $this->account_model->login_user();
						if($this->session->user['us_email'] === 'admin@mail.com') {
                redirect('home');
              } else {
                redirect('home/user');
              }
            } else {
              $this->session->user = false;
              redirect('account');
            }
        }
    }

		public function register_user()
    {
        $this->form_validation->set_rules('email_r', 'Email', 'required');
        $this->form_validation->set_rules('username_r', 'username', 'required');
        $this->form_validation->set_rules('pass_r', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
					$this->load->view('account_view');
        }
        else
        {
            $this->account_model->register_user();
						redirect('account');

        }
    }



		public function logout_user() {
			$this->session->user = false;
			redirect('account');
		}


}
