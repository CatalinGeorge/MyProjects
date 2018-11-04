<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('edit_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->library('form_validation');
							 $this->load->helper('date');
			         $this->load->helper('url');
			         $this->load->library('image_lib');
							 $this->load->helper("file");
			 }

 public function index()
  {
		if($this->session->user) {
			$data['user'] = $this->session->user;
		}else {
				$data['user'] = null;
				redirect('home');}
		$user = $this->session->user['us_id'];
		$data['edit'] = $this->edit_model->edituser($this->session->user['us_id']);
		$this->load->view('includes/header', $data);
    $this->load->view('edit_view',$data);
  }

  public function save_edituser()
  {
		if($_FILES['avatar']['name']){
		$user = $this->session->user['us_id'];
		$path =  './media/profiles/'.$user;
		if(!is_dir($path))
		{
			mkdir($path,0777,TRUE);
		}
					 delete_files($path);
					 $config['upload_path']          = $path;
					 $config['allowed_types']        = 'gif|jpg|png';
					 $config['max_size']             = 10000;
					 $config['max_width']            = 10240;
					 $config['max_height']           = 7680;

					 $this->load->library('upload', $config);

					 if ( ! $this->upload->do_upload('avatar'))
					 {
						 print_r('It dosen.t work you fool!');
					 }
					 else
					 {
									 $data = array('upload_data' => $this->upload->data());
									 $this->edit_model->save_edituser($data['upload_data']['file_name']);
									 redirect('profile');
					 }
				 }
				 else{
					 $this->edit_model->save_edituser(null);
					 redirect('profile');
				 }
}










}
