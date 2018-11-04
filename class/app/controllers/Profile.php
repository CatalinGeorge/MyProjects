<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('profile_model');
							 $this->load->model('single_model');
							 $this->load->model('home_model');
							 $this->load->helper('url_helper');
							 $this->load->library('form_validation');
							 $this->load->library('session');
							 $this->load->helper('directory');
			 }



  public function provider_profile($id)
  {
    $user = $this->session->user['us_id'];
		$this->session->profile = $id;
		$data['user'] = $this->session->user;
    $data['products'] = $this->profile_model->get_products($id);
		$data['usr'] = $this->profile_model->get_user($id);
		$data['categories'] = $this->home_model->get_categories();
		$data['count_products'] = $this->profile_model->count_products($id);

    $this->load->view('profile_view', $data);
  }

	public function send_message()
	{
		if($this->session->user) {
			$data['user'] = $this->session->user;
		}else {
				$data['user'] = null;
				redirect('account');
		}

		$user = $this->session->user;
		$this->profile_model->send_message($user['us_id']);
		redirect('profile/provider_profile/'.$this->session->profile);
	}



}
