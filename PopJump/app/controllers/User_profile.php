<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_profile extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('user_profile_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
			 }

  public function single_profile($id)
  {
    if($this->session->user) {
      $data['user'] = $this->session->user;
		}else {
			  $data['user'] = null;
				redirect('home');
		}
    $user = $this->session->user['us_id'];
    $data['user'] = $this->user_profile_model->get_user($id);
    $data['networks'] = $this->user_profile_model->get_networks($id);
		$this->user_profile_model->update($id,$data['user']['us_views']);
    $this->load->view('includes/header', $data);
    $this->load->view('user_profile_view', $data);
    $this->load->view('includes/footer');
  }






}
