<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_network extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('edit_network_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->library('form_validation');
							 $this->load->helper('date');
			         $this->load->helper('url');
			         $this->load->library('image_lib');
							 $this->load->helper("file");
			 }

 public function edit($id)
  {

		$user = $this->session->user['us_id'];
		$data['edit'] = $this->edit_network_model->edit($id);
		$this->load->view('includes/header', $data);
    $this->load->view('edit_network_view',$data);
  }

  public function save_edit_network()
    {
		 $this->edit_network_model->save_edit_network();
		 redirect('profile');
   }





}
