<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('login_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->library('session');

    }

    public function index()
    {

        // load head
        $this->load->view('includes/head');
        //load view
        $this->load->view('login');
        // load footer
        $this->load->view('includes/footer');

    }

    public function login()
    {
        $this->form_validation->set_rules('id', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
          // load head
          $this->load->view('includes/head');
          //load view
          $this->load->view('login');
          // load footer
          $this->load->view('includes/footer');
        }
        else
        {

        if($this->login_model->login_user()) {
            $this->session->user = $this->login_model->login_user();
              if($this->session->user['u_email'] === 'admin@mail.com') {
                redirect('admin');
              } else {
                redirect('/');
              }
            } else {
              $this->session->user = false;
              redirect('login');
            }
        }
    }

}
