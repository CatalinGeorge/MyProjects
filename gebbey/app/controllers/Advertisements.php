<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisements extends CI_Controller {
    public function __construct()
    {
        parent::__construct();


        $this->load->model('advertisers_model');

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

    }

    public function index()
    {
      $data['user'] =$this->session->user;
      $data['advertisements'] = $this->advertisers_model->get_advertisements($this->session->user['adv_id']);
      $data['user'] =$this->session->user;


      $this->load->view('includes/head');
      $this->load->view('includes/nav_front', $data);
      $this->load->view('ads_view', $data);
      $this->load->view('includes/footer');
      }

      public function deleteadvertisement($id)
      {
        $this->advertisers_model->deleteadvertisement($id);
        redirect('advertisements');
      }

    public function info_advertisements($id)
    {

      $data['user'] =$this->session->user;
      $data['advertisements'] = $this->advertisers_model->see_advertisement($id);

      $this->load->view('includes/head');
      $this->load->view('includes/nav_front', $data);
      $this->load->view('ads_info_view', $data);
      $this->load->view('includes/footer');

    }



}
