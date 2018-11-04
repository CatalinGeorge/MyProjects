<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('single_model');
        $this->load->model('home_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('user_agent');


    }

    public function index()
    {
      $data['comments'] = $this->home_model->get_comments();

    }

    public function get($slug)
    {

      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
        $this->session->item = $slug;
        //$data['comments'] = $this->home_model->get_comments();
        //get data from the database
        $data['item'] = $this->single_model->get_item($slug);
        $data['category'] = $this->home_model->get_category($this->session->category);
          $data['specials'] = $this->single_model->get_specials($data['item']['i_id'], $data['category']['c_id']);

          $data['related'] = $this->single_model->get_related_w($data['item']['i_category'], $data['item']['i_city']);

        // load head and functions
        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('includes/functions');

        //load view and pass the data
        $this->load->view('single', $data);

        // load footer
        $this->load->view('includes/footer');
    }

    public function favourite() {
      echo 'fav';
    }

    public function add_report()
    {
      $this->single_model->add_report();
      redirect('single/get/'.$this->session->item);

    }




}
