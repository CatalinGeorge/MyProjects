<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('admin_model');
        $this->load->model('home_model');
        $this->load->model('advertisers_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');

    }

    public function index()
    {
      //$this->advertisers_model->updateviews($id,$data['advertisements']['advm_numofviews']);
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }

        //get data from the database
        $data['categories'] = $this->home_model->get_categories();

        // load head and functions
        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);

        //load view and pass the data
        $this->load->view('categories', $data);

        // load footer
        $this->load->view('includes/footer');
    }

    public function add_clicks($id)
    {
      $this->advertisers_model->add_clicks($id,$data['advertisements']['advm_clicks']);
    }

}
