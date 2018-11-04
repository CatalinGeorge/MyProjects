<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('register_model');
        $this->load->model('login_model');
        $this->load->model('home_model');
        $this->load->model('admin_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

    }

    public function index()
    {
      $data['countries'] = $this->admin_model->get_locations_countries();
      $data['cities'] = $this->admin_model->get_locations_cities();
      $data['states'] = $this->admin_model->get_locations_states();
      // load head
      $this->load->view('includes/head');

        //load view
        $this->load->view('register', $data);

        // load footer
        $this->load->view('includes/footer');
    }

    public function create()
    {
        // $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //$this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run() === FALSE)
        {
          // load head
          $this->load->view('includes/head');
          //load view
          $this->load->view('register');
          // load footer
          $this->load->view('includes/footer');
        }
        else
        {
            $this->register_model->set_user();

            $uid = strip_tags($this->input->post('userid'));
            $password = strip_tags($this->input->post('password'));

            $search = '@gebeyapp.com';
            $uid = str_replace($search, '', $uid) ;

            if($this->login_model->login_mobile($uid, $password)) {
                $this->session->user = $this->login_model->login_mobile($uid, $password);
                print "<script type=\"text/javascript\">alert('your user ID is ".$this->input->post('userid')."@gebeyapp.com. And password is ".$this->input->post('password').", please keep this information in safe place to login another time.'); setTimeout(function () { window.location.href = '/'; }, 10);</script>";
                //redirect('/');
                } else {
                  $this->session->user = false;
                redirect('login');
                }

            //redirect('login');
        }
    }

}
