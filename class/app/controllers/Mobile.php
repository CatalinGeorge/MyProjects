<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('home_model');
								$this->load->model('single_model');
								$this->load->model('profile_model');
								$this->load->helper('url_helper');

        }



 public function get_categories() {
	 	 header('Access-Control-Allow-Origin: *');
		 $data = $this->home_model->get_categories();
		 echo json_encode($data);
	}

}
