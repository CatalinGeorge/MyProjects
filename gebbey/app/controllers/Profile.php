<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->library('image_lib');
        $this->load->helper("file");
        $this->load->helper('url_helper');

        $this->load->model('profile_model');

    }

    public function index()
    {

      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('login');
      }
      $user = $this->session->user['u_id'];
      $data['items'] = $this->profile_model->get_items($user);
      $data['user_info'] = $this->profile_model->get_user($user);
      $data['comments'] = $this->profile_model->get_comments($user);

        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('profile', $data);
        $this->load->view('includes/footer');

    }

    public function deleteitem($id)
    {
      $this->profile_model->deleteitem($id);
      redirect('profile');
    }

    public function edititem($id)
    {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('login');
      }

        $data['items'] = $this->profile_model->get_items($this->session->user['u_id']);
        $data['item'] = $this->profile_model->edititem($id);
        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('includes/user/edit_item', $data);
        $this->load->view('includes/footer');
    }

    public function save_edititem(){
      $this->profile_model->save_edititem();
      redirect('profile');
    }


    public function update_user() {
      $this->profile_model->update_user();
      redirect('profile');
    }

}
