<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filters extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
      //  $this->load->model('filters_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->helper('directory');


    }

  public function index()
  {
    $data['user'] = $this->session->user;


    $this->load->view('filters_view', $data);
  }




}
