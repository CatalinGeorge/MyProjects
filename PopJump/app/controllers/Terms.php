<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Terms extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 //$this->load->model('home_model');
							 //$this->load->helper('url_helper');
							 $this->load->helper('url');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
							 $this->load->library('form_validation');
			 }

  public function index()
  {
    $data['user'] = $this->session->user;

    $this->load->view('includes/header');
    $this->load->view('terms_view', $data);
    $this->load->view('includes/footer');
  }




}
