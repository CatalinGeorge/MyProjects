<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super_deals extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('categories_model');
        $this->load->model('home_model');
        $this->load->model('super_deals_model');

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
      $data['products'] = $this->super_deals_model->get_products();
  		$data['categories'] = $this->home_model->get_categories();
  		$data['user'] = $this->session->user;

  		$this->load->view('super_deals_view', $data);
    }







}
