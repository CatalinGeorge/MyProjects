<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_product extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('add_product_model');
							 $this->load->model('home_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->library('form_validation');
							 $this->load->helper('date');
			         $this->load->helper('url');
			         $this->load->library('image_lib');
			 }


	public function index()
	{
		$data['user'] = $this->session->user;
		$user = $this->session->user['us_id'];
		$data['categories'] = $this->add_product_model->get_main_categories();
		$data['other_cat'] = $this->add_product_model->get_other_categories();
		// $data['display_size'] = $this->add_product_model->get_display_size();
		// $data['ram_size'] = $this->add_product_model->get_ram_size();
		// $data['proc_type'] = $this->add_product_model->get_proc_type();
		// $data['hd_size'] = $this->add_product_model->get_hd_size();
		// $data['weight'] = $this->add_product_model->get_weight();
		// $data['display_type'] = $this->add_product_model->get_display_type();
		// $data['os'] = $this->add_product_model->get_os();
		// $data['baterry_life'] = $this->add_product_model->get_baterry_life();

		$this->load->view('add_product_view', $data);
	}

	public function add_new_product()
	    {

				$datenow = now();
				$path = "./media/".$datenow;
				if(!is_dir($path))
				{
					mkdir($path,0777,TRUE);
				}

				$config = array();
				$config['upload_path']          = $path;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 15000;
				$config['max_width']            = 20000;
				$config['max_height']           = 20000;
				$config['overwrite']            = FALSE;
				$config['encrypt_name']					= TRUE;
				$this->load->library('upload', $config);

				$count = $this->input->post('count_images');

							for($i=1; $i<$count; $i++)
							{
								$this->upload->do_upload('image'.$i);
							}


				$user = $this->session->user['us_id'];
	      $this->add_product_model->create_product($user, $datenow);
				redirect('home');
	    }




}
