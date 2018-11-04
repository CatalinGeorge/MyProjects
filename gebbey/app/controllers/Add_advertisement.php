<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_advertisement extends CI_Controller {
    public function __construct()
    {
        parent::__construct();


        $this->load->model('advertisers_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('image_lib');
        $this->load->helper('url_helper');
        $this->load->helper('date');

    }

    public function index()
	{
    $data['user'] = $this->session->user;

    $this->load->view('includes/head');
    $this->load->view('includes/nav_front', $data);
    $this->load->view('advertisers/add_advertisement', $data);
    $this->load->view('includes/footer');

	}

  public function resize($img) {
    $configer =  array(
      'image_library'   => 'gd2',
      'source_image'    =>  $img,
      'maintain_ratio'  =>  TRUE,
      'width'           =>  600,
      'height'          =>  600,
    );
    $this->image_lib->clear();
    $this->image_lib->initialize($configer);
    $this->image_lib->resize();
  }

  public function add_advm()
  {
    $user_id = $this->session->user['adv_id'];
    $datenow = now();

    $path = './media/advertisements/'.$user_id.'/'.$datenow.'/';
    if(!is_dir($path)){
      mkdir($path,0777,TRUE);
    }

    $imgpath = 'media/advertisements/'.$user_id.'/'.$datenow.'/';

    $config['upload_path']          = $path;
           $config['allowed_types']        = 'gif|jpg|png';
           $config['max_size']             = 10000;
           $config['max_width']            = 10240;
           $config['max_height']           = 7680;

           $this->load->library('upload', $config);

           if ( ! $this->upload->do_upload('userfile'))
           {
                   $error = array('error' => $this->upload->display_errors());
           }
           else
           {
             $data = $this->upload->data();
             $this->resize($data['full_path']);
             $img = $imgpath.''.$data['file_name'];
             $this->advertisers_model->add_advertisement($user_id,$img);
             redirect('advertisements');

           }
  }



  public function add_advm_admin()
  {
    $user_id = 0;
    $datenow = now();

    $path = './media/advertisements/'.$user_id.'/'.$datenow.'/';
    if(!is_dir($path)){
      mkdir($path,0777,TRUE);
    }

    $imgpath = 'media/advertisements/'.$user_id.'/'.$datenow.'/';

    $config['upload_path']          = $path;
           $config['allowed_types']        = 'gif|jpg|png';
           $config['max_size']             = 10000;
           $config['max_width']            = 10240;
           $config['max_height']           = 7680;

           $this->load->library('upload', $config);

           if ( ! $this->upload->do_upload('userfile'))
           {
                   $error = array('error' => $this->upload->display_errors());
           }
           else
           {
             $data = $this->upload->data();
             $this->resize($data['full_path']);
             $img = $imgpath.''.$data['file_name'];
             $this->advertisers_model->add_advertisement($user_id,$img);
             redirect('admin/go/advertisements');

           }
  }



}
