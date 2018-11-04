<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('home_model');
							 //$this->load->helper('url_helper');
							 $this->load->helper('url');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
							 $this->load->library('form_validation');
			 }

   public function index()
			 	{
					if($this->session->user) {
						redirect('main');
					}
					$this->load->view('home_view');
			 	}

	public function create()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
        {
					$this->load->view('home_view');
        }
        else
        {
            $this->home_model->set_user();
						$this->session->set_flashdata('message', 'Your account has been successfully created! You can login now.');
						redirect('home');
        }
	}

	public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
					$this->session->set_flashdata('message', 'Fill in all the fields.');
					$this->load->view('home_view');
        }
        else
        {
			  if($this->home_model->login_user()) {
					  $this->session->user = $this->home_model->login_user();
                redirect('main');
            } else {
              $this->session->user = false;
							$this->session->set_flashdata('message', 'Check your credentials and try again.');
              redirect('home');
            }

        }
    }


		public function forgot() {
			$this->load->view('forgot_view');
		}


		public function recover_send() {
			$this->home_model->recover();
			$this->session->set_flashdata('message', 'We just sent you an email with instructions.');
			redirect('home');
		}


		public function rpl($id, $hash) {
			$data['id'] = $id;
			$data['hash'] = $hash;
			$this->load->view('rpl_view', $data);
		}


		public function recover_update() {
			$this->home_model->recover_update_password();
			$this->session->set_flashdata('message', 'Password changed succesfully! You can login now.');
			redirect('home');
		}



}
