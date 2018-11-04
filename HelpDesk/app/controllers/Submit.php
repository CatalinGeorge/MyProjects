<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submit extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('submit_model');
								$this->load->helper('url_helper');
								$this->load->helper('url_helper');
							 	$this->load->library('session');
							 	$this->load->library('form_validation');
							 	$this->load->helper('date');
			         	$this->load->helper('url');
			         	$this->load->library('image_lib');

        }

	public function index()
	{
		$user = $this->session->user['us_email'];
		$data['user'] = $this->session->user;

		$this->load->view('includes/header');
		$this->load->view('submit_view', $data);
		$this->load->view('includes/footer');
	}

	public function submit_ticket($id=false)
	{
		$datenow = now();
			$path = "./media/".$datenow;
			if(!is_dir($path))
			{
				mkdir($path,0777,TRUE);
			}

			$config = array();
			$config['upload_path']          = $path;
			$config['allowed_types']        = '*';
			$config['max_size']             = 15000;
			$config['max_width']            = 20000;
			$config['max_height']           = 20000;
			$config['overwrite']            = FALSE;
			//$config['encrypt_name']         = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('document');

			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$user = $this->session->user['us_id'];
      $this->submit_model->submit_ticket($datenow, $file_name, $user);

			if($this->session->user) {
				if($id) {
					redirect('home/user');
				} else {
					redirect('home');
				}

				}else {
						$data['user'] = null;
						redirect('submit');
				}
	}


}
