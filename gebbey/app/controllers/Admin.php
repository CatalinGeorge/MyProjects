<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('admin_model');
        $this->load->model('register_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('user_agent');
        $this->load->library('image_lib');

    }

    public function index()
    {
      $data['reports'] = $this->admin_model->get_reports();
      //Load user session data
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }

      if($this->session->user['u_email'] === 'admin@mail.com') {

        $data['items'] = $this->admin_model->get_listings();
        $data['categories'] = $this->admin_model->get_categories();
        $data['comments'] = $this->admin_model->get_comments();
        $data['users'] = $this->admin_model->get_users();

        // load head and functions
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);

        //load view and pass the data
        $this->load->view('admin', $data);

        // load footer
        $this->load->view('includes/admin/footer');

        $this->load->view('includes/functions');
      } else {
        redirect('/');
      }

    }

    public function go($page) {

      //Load user session data
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }

      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }

      if($page === 'locations') {
        $data['countries'] = $this->admin_model->get_locations_countries();
        $data['cities'] = $this->admin_model->get_locations_cities();
        $data['states'] = $this->admin_model->get_locations_states();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/locations', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'listings') {

        $data['items'] = $this->admin_model->get_listings();
        $data['categories'] = $this->admin_model->get_categories();

        $data['countries'] = $this->admin_model->get_locations_countries();
        $data['cities'] = '';
        $data['states'] = '';

        $data['makes'] = $this->admin_model->get_makes();
        $data['models'] = '';

        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/listings', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'categories') {
        $data['categories'] = $this->admin_model->get_categories();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/categories', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'automobile') {
        $data['makes'] = $this->admin_model->get_makes();
        $data['models'] = $this->admin_model->get_models();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/automobile', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'users') {
        $data['users'] = $this->admin_model->get_users();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/users', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'advertisers') {
        $data['advertisers'] = $this->admin_model->get_advertisers();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/advertisers', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'advertisements') {
        $data['advertisements'] = $this->admin_model->get_advertisements();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/advertisements', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'comments') {
        $data['comments'] = $this->admin_model->get_comments();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/comments', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
      if($page === 'settings') {
        $data['settings'] = $this->admin_model->get_settings();
        $this->load->view('includes/head');
        $this->load->view('includes/nav_admin', $data);
        $this->load->view('includes/side_admin', $data);
        $this->load->view('includes/admin/settings', $data);
        $this->load->view('includes/admin/footer');
        $this->load->view('includes/functions');
      }
    }




    public function update_settings() {
      $this->admin_model->update_settings();
      redirect('admin/go/settings');
    }

    public function deleteadvertiser($id)
    {
      $this->admin_model->deleteadvertiser($id);
      redirect('admin/go/advertisers');
    }

    public function editadvertiser($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['user'] = $this->admin_model->editadvertiser($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/advertiser', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editadvertiser(){
      $this->admin_model->save_editadvertiser();
      redirect('admin/go/advertisers');
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


    public function addcategory() {
      $path = './media/categories/';

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
               $img = $data['file_name'];

                 if ( ! $this->upload->do_upload('userfilemobile'))
                 {
                         $error = array('error' => $this->upload->display_errors());
                 }
                 else
                 {
                   $dataz = $this->upload->data();
                   $this->resize($dataz['full_path']);
                   $icon = $dataz['file_name'];

                   $this->admin_model->addcategory($img, $icon);
                   redirect('admin/go/categories');

                 }


             }
    }

    public function editcategory($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['category'] = $this->admin_model->editcategory($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/category', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editcategory(){

      $img = null;
      $icon = null;

      $path = './media/categories/';

      $config['upload_path']          = $path;
             $config['allowed_types']        = 'gif|jpg|png';
             $config['max_size']             = 10000;
             $config['max_width']            = 10240;
             $config['max_height']           = 7680;

             $this->load->library('upload', $config);

             if (!empty($_FILES['userfile']['name'])) {
               if ( ! $this->upload->do_upload('userfile'))
               {
                       $error = array('error' => $this->upload->display_errors());
                       print_r($error);
               }
               else
               {
                 $data = $this->upload->data();
                 $this->resize($data['full_path']);
                 $img = $data['file_name'];
               }
             } else { $img = null; }

             if (!empty($_FILES['userfilemobile']['name'])) {
               if ( ! $this->upload->do_upload('userfilemobile'))
               {
                       $error = array('error' => $this->upload->display_errors());
                       print_r($error);
               }
               else
               {
                 $dataz = $this->upload->data();
                 $this->resize($dataz['full_path']);
                 $icon = $dataz['file_name'];

               }
             } else { $icon = null; }


      $this->admin_model->save_editcategory($img, $icon);
      redirect('admin/go/categories');

    }

    public function deletecategory($id)
    {
      $this->admin_model->deletecategory($id);
      redirect('admin/go/categories');
    }

    //Make
    public function addmake() {
      $this->admin_model->addmake();
      redirect('admin/go/automobile');
    }
    public function editmake($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['make'] = $this->admin_model->editmake($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/make', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editmake(){
      $this->admin_model->save_editmake();
      redirect('admin/go/automobile');
    }

    public function deletemake($id)
    {
      $this->admin_model->deletemake($id);
      redirect('admin/go/automobile');
    }

    //Model
    public function addmodel() {
      $this->admin_model->addmodel();
      redirect('admin/go/automobile');
    }
    public function editmodel($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['model'] = $this->admin_model->editmodel($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/model', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editmodel(){
      $this->admin_model->save_editmodel();
      redirect('admin/go/automobile');
    }

    public function deletemodel($id)
    {
      $this->admin_model->deletemodel($id);
      redirect('admin/go/automobile');
    }

    //Items
    public function additem() {

    }
    public function edititem($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['item'] = $this->admin_model->edititem($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/item', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_edititem(){
      $this->admin_model->save_edititem();
      redirect('admin/go/listings');
    }

    public function deleteitem($id)
    {
      $this->admin_model->deleteitem($id);
      redirect('admin/go/listings');
    }

    //Comments
    public function editcomment() {

    }
    public function deletecomment($id)
    {
      $this->admin_model->deletecomment($id);
      redirect('admin/go/comments');
    }

    //Users
    public function adduser() {
      $this->register_model->set_user();
    }
    public function edituser($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['user'] = $this->admin_model->edituser($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/user', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_edituser(){
      $this->admin_model->save_edituser();
      redirect('admin/go/users');
    }

    public function deleteuser($id)
    {
      $this->admin_model->deleteuser($id);
      redirect('admin/go/users');
    }

    //Locations
    //Country
    public function addcountry() {
      $this->admin_model->addcountry();
      redirect('admin/go/locations');
    }

    public function editcountry($id){
      //Load user session data
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['country'] = $this->admin_model->editcountry($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/country', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
     }

     public function save_editcountry(){
       $this->admin_model->save_editcountry();
       redirect('admin/go/locations');
     }

    public function deletecountry($id)
     {
        $this->admin_model->deletecountry($id);
        redirect('admin/go/locations');

      // adminmodel - delete id
      // redirect aici
    }
    //State
    public function addstate() {
      $this->admin_model->addstate();
      redirect('admin/go/locations');
    }
    public function editstate($id) {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['state'] = $this->admin_model->editstate($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/state', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editstate(){
      $this->admin_model->save_editstate();
      redirect('admin/go/locations');
    }

    public function deletestate($id)
    {
      $this->admin_model->deletestate($id);
      redirect('admin/go/locations');
    }
    //City
    public function addcity() {
      $this->admin_model->addcity();
      redirect('admin/go/locations');
    }
    public function editcity($id){
      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }
      //Check and load user session data
      if($this->session->user['u_email'] === 'admin@mail.com') {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
        redirect('/');
      }
      $data['city'] = $this->admin_model->editcity($id);
      $this->load->view('includes/head');
      $this->load->view('includes/nav_admin', $data);
      $this->load->view('includes/side_admin', $data);
      $this->load->view('includes/admin/edit/city', $data);
      $this->load->view('includes/admin/footer');
      $this->load->view('includes/functions');
    }

    public function save_editcity(){
      $this->admin_model->save_editcity();
      redirect('admin/go/locations');
    }

    public function deletecity($id)
    {
      $this->admin_model->deletecity($id);
      redirect('admin/go/locations');
    }

}
