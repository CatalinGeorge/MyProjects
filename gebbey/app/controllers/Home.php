<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('home_model');
        $this->load->model('admin_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->library('image_lib');
        $this->load->library('pagination');

    }

    public function index()
    {
      //$data['comments'] = $this->home_model->get_comments();

    }


    public function create()
    {

      $datenow = now();
      $cat = $this->session->category;

        $this->form_validation->set_rules('name', 'Title', 'required');
        $upload_data;

        if ($this->form_validation->run() === FALSE)
        {
            redirect('home');
        }
        else
        {

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
          $config['encrypt_name']         = TRUE;
          $this->load->library('upload', $config);

                $files = $_FILES;

                $cpt = $this->input->post('count_images');



                for($i=1; $i<$cpt; $i++)
                {

                  $this->upload->initialize($config);

                  if ( ! $this->upload->do_upload('image'.$i)) :
                    $error = array('error' => $this->upload->display_errors());
                  else :
                    $final_files_data[] = $this->upload->data();

                          endif;

                }
                foreach ($final_files_data as $image)
                {
                  $this->resize($image['full_path']);
                }
                $insert_id = $this->home_model->set_items($datenow, $final_files_data);
                $this->home_model->set_specials($this->input->post('category_id'), $insert_id);

                redirect('category/'.$cat);
        }


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

    public function comment()
    {
      $comment_data = $_REQUEST;
      $comment = $this->input->post('write-comment');
      $user = $this->input->post('user-comment');
      $listing = $this->input->post('listing-comment');
      $listing_user = $this->input->post('listing-user');
      $this->home_model->set_comment($comment,$user,$listing, $listing_user);
    }

    public function getcomments($listing)
    {
        $this->db->from('comments');
        $this->db->where('co_listing', $listing );
        $this->db->join('users', 'users.u_id = comments.co_user');
        $this->db->order_by("comments.co_added", "desc");
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              print_r(json_encode($result));
        }

    }

    public function displaycategory($cat, $number = 0) {

      $data['settings'] = $this->admin_model->get_settings();
      $data['advm_step'] = $data['settings']['set_listings_per_page'] / $data['settings']['set_advertisements_per_page'];

      $this->session->category = $cat;

      $count_items = $this->home_model->count('items', $cat);

      $settings = $this->admin_model->get_settings();

      $config['base_url'] = base_url().'category/'.$cat;
      $config['total_rows'] = $count_items;
      $config['per_page'] = $settings['set_listings_per_page'];
      $config['uri_segment'] = 3;
      $config['last_link'] = '>>';
      $config['first_link'] = '<<';
      $config['next_tag_open'] = '<span>';
      $config['next_tag_close'] = '</span>';
      $config['prev_tag_open'] = '<span>';
      $config['prev_tag_close'] = '</span>';
      $config['first_tag_open'] = '<span>';
      $config['first_tag_close'] = '</span>';
      $config['last_tag_open'] = '<span>';
      $config['last_tag_close'] = '</span>';

      $this->pagination->initialize($config);


      if($this->session->country) {
        $data['country'] = $this->session->country;
      } else {
        $data['country'] = $this->input->post('country');
        $this->session->country = $data['country'];
      }


      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }

        //get data from the database

        $data['advertisements'] = $this->home_model->get_advertisements($data['settings']['set_advertisement_last_id'], $data['settings']['set_advertisements_per_page']);

        //echo $data['settings']['set_advertisement_last_id'];
        //echo $data['settings']['set_advertisements_per_page'];

        //print_r($data['advertisements']);

        $data['max_price_select'] = $this->home_model->max_price($cat);
        $data['items'] = $this->home_model->get_itemscategory($cat, $number, $settings['set_listings_per_page']);
        $data['categories'] = $this->admin_model->get_categories();
        $data['category'] = $this->home_model->get_category($cat);

        $data['countries'] = $this->admin_model->get_locations_countries();
        $data['cities'] = '';
        $data['states'] = '';

        $data['makes'] = $this->admin_model->get_makes();
        $data['models'] = '';

        // load head and functions
        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('includes/functions');

        //load view and pass the data
        $this->load->view('home', $data);

        // load footer
        $this->load->view('includes/footer');
    }

    public function advertisement($id, $clicks) {
      $advm = $this->home_model->get_advertisement_details($id);
      $this->home_model->update_advertisement_clicks($id, $clicks);
      header('location: '.$advm['advm_url_address']);
    }



    public function get_states($country) {
      echo json_encode($this->home_model->get_states($country));
    }

    public function get_cities($state) {
      echo json_encode($this->home_model->get_cities($state));
    }

    public function get_models($make) {
      echo json_encode($this->home_model->get_models($make));
    }

    public function search(){

      if($this->session->user) {
        $data['user'] = $this->session->user;
      } else {
        $data['user'] = null;
      }

      //get data from the database
      //$data['items'] = $this->home_model->get_itemscategory($cat, $number,6);
      $data['max_price_select'] = $this->home_model->max_price();
      $data['items'] = $this->home_model->search();
      $data['categories'] = $this->admin_model->get_categories();
      $data['category'] = null;

      $data['countries'] = $this->admin_model->get_locations_countries();
      $data['cities'] = '';
      $data['states'] = '';

      $data['makes'] = $this->admin_model->get_makes();
      $data['models'] = '';

      // load head and functions
      $this->load->view('includes/head');
      $this->load->view('includes/nav_front', $data);
      $this->load->view('includes/functions');

      //load view and pass the data
      $this->load->view('home', $data);

      // load footer
      $this->load->view('includes/footer');
      }

      public function filters()
      {
        if($this->session->user) {
          $data['user'] = $this->session->user;
        } else {
          $data['user'] = null;
        }

        if($this->session->country) {
          $this->session->country = $this->input->post('country');
        } else {
          $this->session->country = $this->input->post('country');
        }

        if($this->session->state) {
          $this->session->state = $this->input->post('state');
        } else {
          $this->session->state = $this->input->post('state');
        }

        if($this->session->city) {
          $this->session->city = $this->input->post('city');
        } else {
          $this->session->city = $this->input->post('city');
        }


        if($this->session->make) {
          $this->session->make = $this->input->post('make');
        } else {
          $this->session->make = $this->input->post('make');
        }

        if($this->session->model) {
          $this->session->model = $this->input->post('model');
        } else {
          $this->session->model = $this->input->post('model');
        }





        // if (!$this->session->country('country'))
        //   {
        //     $data['countries'] = $this->post->input('country');
        //     $this->session->set_flashdata('country', $data['countries']);
        //   }



        $data['settings'] = $this->admin_model->get_settings();
        $data['advm_step'] = $data['settings']['set_listings_per_page'] / $data['settings']['set_advertisements_per_page'];

        $cat = $this->session->category;
        $this->session->category = $cat;
        $data['max_price_select'] = $this->home_model->max_price($cat);
        $data['items'] = $this->home_model->filters($cat);
        $data['categories'] = $this->admin_model->get_categories();
        $data['category'] = null;

        $data['countries'] = $this->admin_model->get_locations_countries();
        $data['cities'] = '';
        $data['states'] = '';

        $data['makes'] = $this->admin_model->get_makes();
        $data['models'] = '';

        // load head and functions
        $this->load->view('includes/head');
        $this->load->view('includes/nav_front', $data);
        $this->load->view('includes/functions');

        //load view and pass the data
        $this->load->view('home', $data);

        // load footer
        $this->load->view('includes/footer');
      }

  public function search_simple()
  {

    if($this->session->user) {
      $data['user'] = $this->session->user;
    } else {
      $data['user'] = null;
    }
    $data['settings'] = $this->admin_model->get_settings();
    $data['advm_step'] = $data['settings']['set_listings_per_page'] / $data['settings']['set_advertisements_per_page'];

    $cat = $this->session->category;
    $data['max_price_select'] = $this->home_model->max_price($cat);
    $data['items'] = $this->home_model->search_simple($cat);
    $data['categories'] = $this->admin_model->get_categories();
    $data['category'] = null;

    $data['countries'] = $this->admin_model->get_locations_countries();
    $data['cities'] = '';
    $data['states'] = '';

    $data['makes'] = $this->admin_model->get_makes();
    $data['models'] = '';


    $this->load->view('includes/head');
    $this->load->view('includes/nav_front', $data);
    $this->load->view('includes/functions');

    //load view and pass the data
    $this->load->view('home', $data);

    // load footer
    $this->load->view('includes/footer');


  }

}
