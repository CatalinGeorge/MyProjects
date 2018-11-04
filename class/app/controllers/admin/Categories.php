<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('Admin_model/categories_model', 'admin_categories');
							// $this->load->model('home_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->library('form_validation');
							 $this->load->helper('date');
			         $this->load->helper('url');
			         $this->load->library('image_lib');
			 }


			 public function index()
	     {

	     }

			 public function get_subcategories($main = 1)
	     {
				 $data['main'] = $main;
				 $data['categories'] = $this->admin_categories->get_categories();
	 			 $this->load->view('admin_views/includes/head');
	       $this->load->view('admin_views/subcategories', $data);
	 			 $this->load->view('admin_views/includes/footer');
	     }

    public function add_category()
    {
      $this->categories_model->add_category();
    }

		public function get_subcategories_json($main) {
			$subcategories = $this->admin_categories->get_subcategories($main);
			echo json_encode($subcategories);
		}

		public function update_subcategory() {
			$json = '['.$_GET['json'].']';
			$main = $_GET['main_category'];
			$update = $this->admin_categories->update_subcategory($json, $main);
		}







}
