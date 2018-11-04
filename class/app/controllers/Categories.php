<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('categories_model');
        $this->load->model('home_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
        $this->load->helper('directory');


    }

  public function single_category($id)
  {
    $data['main'] = $id;
    $data['user'] = $this->session->user;
    $data['products'] = $this->categories_model->get_products($id);
    $data['categories'] = $this->home_model->get_categories();
    $data['cat'] = $this->categories_model->get_cat_lvl1($id);

    $this->load->view('categories_view', $data);
  }

  public function tag_level($id)
  {
    $data['user'] = $this->session->user;
    $data['cat'] = $this->categories_model->get_cat_lvls($id);
    $data['products'] = $this->categories_model->get_products_tags($id);

    $this->load->view('categories_view', $data);
  }

  public function search()
  {
    $data['user'] = $this->session->user;
    $data['categories'] = $this->home_model->get_categories();
    $data['products'] = $this->categories_model->search();

    $this->load->view('categories_view',$data);
  }










}
