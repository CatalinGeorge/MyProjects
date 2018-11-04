<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller {

	public function __construct()
			 {
							 parent::__construct();
							 $this->load->model('user_profile_model');
							 $this->load->model('add_product_model');
							 $this->load->model('single_model');
							 $this->load->model('home_model');
							 $this->load->helper('url_helper');
							 $this->load->library('form_validation');
							 $this->load->helper('form');
							 $this->load->library('session');
							 $this->load->helper('directory');
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
				redirect('account');
		}

    $user = $this->session->user['us_id'];
		$data['user'] = $this->session->user;
		$data['categories'] = $this->home_model->get_categories();
		$data['products'] = $this->user_profile_model->get_products($user);
		$data['count_products'] = $this->user_profile_model->count_products($user);
		$data['count_messages'] = $this->user_profile_model->count_messages($user);
		$data['count_offers'] = $this->user_profile_model->count_offers($user);
		$data['count_product_offers'] = $this->user_profile_model->count_product_offers($user);
		$data['count_favorites'] = $this->user_profile_model->count_favorites($user);
		$data['messages'] = $this->user_profile_model->get_messages($user);
		$data['offers'] = $this->user_profile_model->get_offers($user);
		$data['product_offers'] = $this->user_profile_model->get_product_offers($user);
		$data['favorites'] = $this->user_profile_model->get_favorites($user);
		$data['replies'] = $this->user_profile_model->get_replies($user);
		$recently_viewed = $_SESSION['r_w'];
	 $data['recently_viewed'] = $this->single_model->get_recently_viewed($recently_viewed);

    $this->load->view('user_profile_view', $data);
  }

	public function edit_profile()
	{
		$user = $this->session->user['us_id'];
		$data['user'] = $this->session->user;

		if($_FILES['avatar']['name']){
		$user = $this->session->user['us_id'];
		$path =  './media/profile/'.$user;
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
					 $config['encrypt_name']					= TRUE;

					 $this->load->library('upload', $config);

					 if ( ! $this->upload->do_upload('avatar'))
					 {

					 }
					 else
					 {
									 $data = array('upload_data' => $this->upload->data());
									 $this->user_profile_model->edit_profile($data['upload_data']['file_name']);
									 redirect('user_profile');
					 }
				 }
				 else{
					 $this->user_profile_model->edit_profile(null);
					 redirect('user_profile');
				 }

	}

	public function edit_product($id)
	{
		$this->session->product = $id;
		$data['user'] = $this->session->user;
		$user = $this->session->user['us_id'];
		$data['product'] = $this->user_profile_model->get_product($id);
		$data['categories'] = $this->home_model->get_categories();
		$data['display_size'] = $this->add_product_model->get_display_size();
		$data['ram_size'] = $this->add_product_model->get_ram_size();
		$data['proc_type'] = $this->add_product_model->get_proc_type();
		$data['hd_size'] = $this->add_product_model->get_hd_size();
		$data['weight'] = $this->add_product_model->get_weight();
		$data['display_type'] = $this->add_product_model->get_display_type();
		$data['os'] = $this->add_product_model->get_os();
		$data['baterry_life'] = $this->add_product_model->get_baterry_life();
		 //print_r($data['product']);
		 $this->session->media = $data['product']['pr_media'];
		 print_r($this->session->media);

		$this->load->view('edit_product_view', $data);
	}

	public function save_edit_product()
	{
		$path = "./media/".$this->session->media;


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

    $this->user_profile_model->save_edit_product();
		//print_r($path);

    redirect('user_profile');
	}

	public function remove_image($path,$image)
	{
		unlink(FCPATH.'media/'.$path.'/'.$image);
		redirect('user_profile/edit_product/'.$this->session->product);
	}

	public function remove_offer($id)
	{
		$user = $this->session->user['us_id'];
	 	$this->user_profile_model->remove_offer($id,$user);
	 	redirect('user_profile');
	}

	public function take_offer($id)
	{
		$user = $this->session->user['us_id'];
	 	$this->user_profile_model->take_offer($id);
	 	redirect('user_profile');
	}

	public function add_reply()
	{
		$user = $this->session->user['us_id'];
	 	$this->user_profile_model->add_reply($user);
	 	redirect('user_profile');
	}

	public function remove_product_offer($id)
	{
		$user = $this->session->user['us_id'];
	 	$this->user_profile_model->remove_product_offer($id,$user);
	 	redirect('user_profile');
	}

	public function take_product_offer($id)
	{
		$user = $this->session->user['us_id'];
	 	$this->user_profile_model->take_product_offer($id);
	 	redirect('user_profile');
	}

	public function remove_favorite($id)
	 {
		 $user = $this->session->user['us_id'];
		 $this->user_profile_model->remove_favorite($id,$user);
		 redirect('user_profile');
	 }






}
