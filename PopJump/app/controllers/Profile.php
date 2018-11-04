<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('profile_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
							 $this->load->helper('file');
			 }

  public function index()
  {
    if($this->session->user) {
      $data['user'] = $this->session->user;
		}else {
			  $data['user'] = null;
				redirect('home');
		}
    $user = $this->session->user['us_id'];
    $data['networks'] = $this->profile_model->get_networks($user);
		$data['info'] = $this->profile_model->get_user($user);
    $this->load->view('includes/header', $data);
    $this->load->view('profile_view', $data);
    $this->load->view('includes/footer');
  }

  public function delete_network($id)
  {
    $user = $this->session->user['us_id'];
    $this->profile_model->delete_network($id);
    redirect('profile');
  }

  

	public function change_password()
	{
		$user = $this->session->user['us_id'];
		$this->profile_model->change_password($user);
		$this->session->set_flashdata('message', 'Your password has been successfully changed!');
		redirect('profile');
	}

	public function delete_account()
    {
			$user = $this->session->user['us_id'];
      $this->profile_model->delete_account($user);
			delete_files('media/profiles/'.$user, TRUE);
			rmdir('media/profiles/'.$user);
			$this->session->set_flashdata('message', 'Your account has been successfully deleted!');
      redirect('home');
    }

}
