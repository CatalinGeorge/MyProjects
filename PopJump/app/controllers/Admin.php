<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('admin_model');
        //load libraries
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('user_agent');
        $this->load->helper('url');
        $this->load->helper('directory');
        $this->load->helper('file');
        $this->load->library('form_validation');

    }

  public function index()
  {
    $this->load->view('includes/header');
    $this->load->view('admin_view');
  }

  public function login_admin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {

        }
        else
        {
        if($this->admin_model->login_admin()) {
            $this->session->user = $this->admin_model->login_admin();
              if($this->session->user['us_email'] === 'admin@mail.com' && $this->session->user['us_password'] === 'admin' ) {
                redirect('admin/admin_panel');
              } else {
                redirect('admin');
              }
            } else {
              $this->session->user = false;
              redirect('home');
            }
        }
    }

  public function admin_panel()
  {
    $data['user'] = $this->session->user;
		$user = $this->session->user['us_id'];

    $this->load->view('includes/admin_header');
    $this->load->view('admin/admin_panel_view', $data);
  }

  public function go($page)
  {
    $user = $this->session->user['us_id'];
    $data['user'] = $this->session->user['us_id'];
    //Load user session data
    $data['users'] = $this->admin_model->get_users();
    if($this->session->user['us_email'] === 'admin@mail.com') {
      $data['user'] = $this->session->user;
    } else {
      $data['user'] = null;
      redirect('home');
    }

    $this->load->view('includes/admin_header');


      if($page === 'users') {
        //$data['users_p'] = $this->admin_model->get_users_p();

        $data['users'] = $this->admin_model->get_users();
        $this->load->view('admin/users_view', $data);
      }
      if($page === 'platforms') {
        //$data['users_p'] = $this->admin_model->get_users_p();

        $data['platforms'] = $this->admin_model->get_platforms();
        $this->load->view('admin/platforms_view', $data);
      }


    }

    public function search_users()
	   {
       $user = $this->session->user['us_id'];
       $data['user'] = $this->session->user['us_id'];


		$data['users'] = $this->admin_model->search_users();

		$this->load->view('includes/admin_header');
		$this->load->view('admin/users_view', $data);
		//$this->load->view('includes/footer');

	 }

    public function add_platform()
     {
       $this->admin_model->add_platform();
       redirect('admin/go/platforms');
     }

  public function add_network_details($id)
  {
    $this->session->adduser = $id;
    echo $id;
    $data['mazga'] = $this->session->adduser;
    echo $data['mazga'];
    $this->load->view('includes/admin_header');
    $this->load->view('admin/admin_add_network', $data);
  }



  public function delete_user($id)
      {
        $this->admin_model->delete_user($id);
        delete_files('media/profiles/'.$id, TRUE);
        //rmdir('media/profile/'.$id);
        redirect('admin/admin_panel');
      }

      public function edit_user($id) {
            if($this->session->user) {
              $data['user'] = $this->session->user;
            } else {
              $data['user'] = null;
            }
            //Check and load user session data
            if($this->session->user['us_email'] === 'admin@mail.com') {
              $data['user'] = $this->session->user;
            } else {
              $data['user'] = null;
              redirect('home');
            }
            $this->session->edituser = $id;
            $data['user_info'] = $this->admin_model->edit_user($id);
            $this->load->view('includes/admin_header', $data);
            $this->load->view('admin/user_edit_view', $data);
          }

   public function user_networks($id)
   {
     $data['user_networks'] = $this->admin_model->user_networks($id);
     $this->session->edituser = $id;
     $this->load->view('includes/admin_header', $data);
     $this->load->view('admin/user_networks', $data);
   }

   public function save_edituser()
    {
      $this->admin_model->save_edituser();
      redirect('admin/go/users');
    }

    public function save_set_order($user,$order)
     {
       $this->admin_model->save_set_order($user,$order);
       redirect('admin/go/users');
     }

    public function delete_network($id)
        {
          $this->admin_model->delete_network($id);
          redirect('admin/user_networks/'.$this->session->edituser);
        }

        public function edit_network($id) {
              if($this->session->user) {
                $data['user'] = $this->session->user;
              } else {
                $data['user'] = null;
              }
              //Check and load user session data
              if($this->session->user['us_email'] === 'admin@mail.com') {
                $data['user'] = $this->session->user;
              } else {
                $data['user'] = null;
                redirect('home');
              }
              $this->session->editnetwork = $id;
              $data['net_info'] = $this->admin_model->edit_network($id);
              $this->load->view('includes/admin_header', $data);
              $this->load->view('admin/network_edit_view', $data);
            }

    public function save_editnetwork()
     {
        $this->admin_model->save_editnetwork();
        redirect('admin/user_networks/'.$this->session->edituser);
     }

    public function set_popularity($id)
    {
      $data['users'] = $this->admin_model->get_users_pop($id);
      $this->admin_model->set_popularity($id,$data['users']['us_set_pop']);
      redirect('admin/go/users/');
    }

    public function unset_popularity($id)
    {
      $data['users'] = $this->admin_model->get_users_pop($id);
      $this->admin_model->unset_popularity($id,$data['users']['us_set_pop']);
      redirect('admin/go/users/');
    }

    public function block($id)
    {
      $data['users'] = $this->admin_model->get_users_pop($id);
      $this->admin_model->block($id,$data['users']['us_set_block']);
      redirect('admin/go/users/');
    }

    public function unblock($id)
    {
      $data['users'] = $this->admin_model->get_users_pop($id);
      $this->admin_model->unblock($id,$data['users']['us_set_block']);
      redirect('admin/go/users/');
    }

  public function add_network()
  {
		$this->admin_model->add_network();
    redirect('admin/go/users');
  }

  public function remove_img($id)
  {
    delete_files('media/profiles/'.$id, TRUE);
    //rmdir('media/profile/'.$id);
    redirect('admin/edit_user/'.$id);
  }

  public function delete_platform($id)
  {
    $this->admin_model->delete_platform($id);
    redirect('admin/go/platforms');
  }


}
