<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('home_model');
								$this->load->model('single_model');
								$this->load->helper('url_helper');
								$this->load->library('session');
								$this->load->helper('directory');
								$this->load->library('form_validation');
								$this->load->helper('text');

        }

	public function index()
	{
		$data['products'] = $this->home_model->get_products();
		$data['categories'] = $this->home_model->get_categories();
		if (!isset($_SESSION['r_w'])) {
			$_SESSION['r_w'] = array(3);
		}
		$recently_viewed = $_SESSION['r_w'];
		print_r($recently_viewed);

		 //$recently_viewed = $_SESSION['r_w'];

		 $data['recently_viewed'] = $this->single_model->get_recently_viewed($recently_viewed);

		$data['user'] = $this->session->user;





		$this->load->view('home_view', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata($_SESSION['r_w'] = array(3));
    redirect('home');
	}

	public function search_category()
	{
		$data['user'] = $this->session->user;
		$data['categories'] = $this->home_model->get_categories();
		$data['products'] = $this->home_model->search_category();

		$this->load->view('categories_view',$data);
	}






}
