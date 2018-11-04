<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisers extends CI_Controller {
    public function __construct()
    {
        parent::__construct();


        $this->load->model('advertisers_model');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->library('session');

    }

    public function index($id)
    {

      $data['user'] =$this->session->user;
      //$this->advertisers_model->updateviews($id,$data['advertisements']['advm_numofviews']); //updating views
    }

    public function account() {
      // load head
      $this->load->view('includes/head');
      //load view
      $this->load->view('advertisers/login');
      // load footer
      $this->load->view('includes/footer');
    }

    public function register()
    {
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('location', 'Location', 'required');

      if ($this->form_validation->run() === FALSE)
      {
        // load head
        $this->load->view('includes/head');
        //load view
        $this->load->view('advertisers/login');
        // load footer
        $this->load->view('includes/footer');
      }
      else
      {
          $this->advertisers_model->set_advertiser();
          // load head
          $this->load->view('includes/head');
          //load view
          $this->load->view('advertisers/login');
          // load footer
          $this->load->view('includes/footer');
      }
    }

    public function login()
    {
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if ($this->form_validation->run() === FALSE)
      {
        // load head
        $this->load->view('includes/head');
        //load view
        $this->load->view('advertisers/login');
        // load footer
        $this->load->view('includes/footer');
      }
      else
      {


          $this->session->user = $this->advertisers_model->login_advertiser();
            if($this->session->user == false) {
              redirect('home');
            } else {
              redirect('advertisements');
            }

    }
  }

    public function ads()
    {

      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('advertisers/ads');
      }
      $data['advertisements'] = $this->advertisers_model->get_advertisements($this->session->user['adv_id']);

        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('advertisers/ads', $data);
        $this->load->view('includes/footer');
}


  public function add_banner()
	{
		$this->advertisers_model->add_banner();
	}

  public function add_clicks($id)
  {
    $this->advertisers_model->add_clicks($id,$data['advertisements']['advm_clicks']);
  }

  public function display_banners()
  {
    // $budget * 100 = $numofviews
    // $numofdays = x => $numofviews/$numofdays = $x
  //  10 * 100 = 1000
  //  5 = 1000/5 = 200/day
  }

}
