<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('main_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
			 }

   public function index()
			 	{
					if($this->session->user) {
			      $data['user'] = $this->session->user;
					}else {
						  $data['user'] = null;
							redirect('home');
					}
					$data['profiles'] = $this->main_model->get_profiles();
					$data['user'] = $this->session->user;
					$user = $this->session->user['us_id'];
			 		$this->load->view('includes/header', $data);
			 		$this->load->view('main_view', $data);
			 		$this->load->view('includes/footer');
			 	}

	public function search()
	{
		if($this->session->user) {
			$data['user'] = $this->session->user;
		}else {
				$data['user'] = null;
				redirect('home');
		}

		$data['search'] = true;

		$data['profiles'] = $this->main_model->search();
		$data['user'] = $this->session->user;
		$user = $this->session->user['us_id'];
		$this->load->view('includes/header', $data);
		$this->load->view('main_view', $data);
		$this->load->view('includes/footer');
	}


}
