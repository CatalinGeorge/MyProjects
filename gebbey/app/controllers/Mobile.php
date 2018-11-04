<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Mobile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('home_model');
        $this->load->model('admin_model');
        $this->load->model('single_model');
        $this->load->model('login_model');
        $this->load->model('register_model');
        $this->load->model('profile_model');

        //load libraries
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('image_lib');

    }

    public function index()
    {

    }

    public function search_mobile($terms) {
      $results = $this->home_model->search_mobile($terms);
      echo json_encode($results);
    }

    public function count_categ($cat) {
      $count_items = $this->home_model->count('items', $cat);
      echo json_encode($count_items);
    }

    public function get_categories()
    {
      $categories = $this->home_model->get_categories();
      echo json_encode($categories);
    }

    public function get_items($cat, $start, $step) {

       $items = $this->home_model->get_itemscategory($cat, $start, $step);
       echo json_encode($items);
    }

    public function get_items_mobile($cat, $start, $step) {

       $items = $this->home_model->get_itemscategory_mobile($cat, $start, $step);
       echo json_encode($items);
    }

    public function get_media($media) {
      $media = $this->home_model->get_media($media);
      echo json_encode($media);
    }

    public function get_item($slug) {
      $item = $this->single_model->get_item($slug);
      echo json_encode($item);
    }

    public function get_related($cat, $city) {
      $item = $this->single_model->get_related($cat, $city);
      echo json_encode($item);
    }

    public function delete_item($id) {
      $this->admin_model->deleteitem($id);
    }

    public function get_specials($item, $category) {
      $specials = $this->single_model->get_specials($item, $category);
      echo json_encode($specials);
    }

    public function get_comments($item) {
      $item = $this->home_model->get_comments($id);
      echo json_encode($item);
    }

    public function post_comment($listing, $user, $comment, $listing_user) {
      $item = $this->home_model->set_comment_mobile($comment,$user,$listing, $listing_user);
      echo json_encode($item);
    }

    public function user_comments($user) {
      $comments = $this->profile_model->user_comments($user);
      echo json_encode($comments);
    }


    public function login($userid, $password) {
       $user = $this->login_model->login_mobile($userid, $password);
       echo json_encode($user);
    }

    public function check_username($username = null) {
        $user = $this->login_model->check_username($username);
        echo json_encode($user);
    }

    public function register($userid, $email, $username, $password, $country, $state, $city, $phone) {

      if(!isset($email)) {
        $email = 'undefined';
      } else {
        $email = strip_tags($_GET['u_email']);
      }

      $user_data = array(
        'u_userid'=>strip_tags($_GET['u_userid']),
        'u_email'=>$email,
        'u_username'=> strip_tags($_GET['u_username']),
        'u_password'=> md5($_GET['u_password']),
        'u_country'=> strip_tags($_GET['u_country']),
        'u_state'=> strip_tags($_GET['u_state']),
        'u_city'=> strip_tags($_GET['u_city']),
        'u_phone'=> strip_tags($_GET['u_phone']),
      );

       $user = $this->register_model->register_mobile($user_data);
       echo json_encode($user);
    }

    public function get_user($id) {
       $user = $this->home_model->get_user($id);
       echo json_encode($user);
    }

    public function get_user_items($id) {
       $user = $this->profile_model->get_items($id);
       echo json_encode($user);
    }


    public function get_countries() {
      echo json_encode($this->admin_model->get_locations_countries());
    }

    public function get_states($country) {
      echo json_encode($this->home_model->get_states($country));
    }

    public function get_cities($state) {
      echo json_encode($this->home_model->get_cities($state));
    }

    public function get_makes() {
      echo json_encode($this->admin_model->get_makes());
    }

    public function get_models($make) {
      echo json_encode($this->home_model->get_models($make));
    }


    public function get_advertisement() {
      $data['settings'] = $this->admin_model->get_settings();
      $result = $this->home_model->get_advertisements($data['settings']['set_advertisement_last_id'], $data['settings']['set_advertisements_per_page']);
      echo json_encode($result);
    }

    public function get_settings() {
      $data['settings'] = $this->admin_model->get_settings();
      echo json_encode($data['settings']);
    }

    public function create($key) {

      $product_category = $_GET['product_category'];
      $product_category_id = $_GET['product_category_id'];

      $product_data = array(
        'product_category_id'=>$_GET['product_category_id'],
        'product_category'=>$_GET['product_category'],
        'product_user'=> $_GET['product_user'],
        'product_name'=> $_GET['product_name'],
        'product_description'=> $_GET['product_description'],
        'product_price'=> $_GET['product_price'],
        'product_country'=> $_GET['product_country'],
        'product_state'=> $_GET['product_state'],
        'product_city'=> $_GET['product_city'],
        'product_address'=> $_GET['product_address'],
        'product_phone'=> $_GET['product_phone'],
        'product_email'=> $_GET['product_email'],
      );

      // realestate
      if($product_category_id == 1) {
        $product_specials = array(
          'product_type'=>$_GET['product_type'],
          'product_rentsale'=> $_GET['product_rentsale'],
        );
      }

      // jobs
        else if($product_category_id == 2) {
              $product_specials = array(
                'product_company'=>$_GET['product_company'],
                'product_job_title'=> $_GET['product_job_title'],
                'product_qualification'=> $_GET['product_qualification'],
                'product_deadline'=> $_GET['product_deadline'],
              );
          }

      // automobile
      else if($product_category_id == 5) {
          $product_specials = array(
            'product_make'=>$_GET['product_make'],
            'product_model'=> $_GET['product_model'],
            'product_mileage'=> $_GET['product_mileage'],
            'product_color'=> $_GET['product_color'],
            'product_body'=> $_GET['product_body'],
            'product_year_made'=> $_GET['product_year_made'],
          );
        }

      // events
    else if($product_category_id == 6) {
        $product_specials = array(
          'product_events_company'=>$_GET['product_events_company'],
          'product_startdate'=> $_GET['product_events_startdate'],
          'product_starttime'=> $_GET['product_events_starttime'],
        );
      }

      else {
        $product_specials = null;
      }

      $this->home_model->set_items_mobile($product_data, $product_specials, $key);

    }




    public function upload($key, $x) {

          $file_path = "./media/".$key."/";
          if(!is_dir($file_path))
          {
            mkdir($file_path,0777,TRUE);
          }

          $file_path = $file_path . basename( $_FILES['file']['name'].'-'.$x);
          if(move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
              echo "success";

              if($x==0) {
                $dataimgs = array(
                  'me_img' => $_FILES['file']['name'].'-'.$x,
                  'me_dir' => $key,
                  'me_cover' => 1
                );
              } else {
                $dataimgs = array(
                  'me_img' => $_FILES['file']['name'].'-'.$x,
                  'me_dir' => $key,
                  'me_cover' => 0
                );
              }

              $this->db->insert('media', $dataimgs);

          } else{
              echo "fail";
          }

          $this->resize($file_path);

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


    public function updateProduct() {
      return $this->profile_model->update_item_mobile($_GET['product_id'], $_GET['product_name'], $_GET['product_description'], $_GET['product_price'], $_GET['product_address'], $_GET['product_phone'], $_GET['product_email']);
    }





  }
