<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Single extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        //load model
        $this->load->model('single_model');
        $this->load->model('home_model');
      //  $this->load->model('profile_model');

        //load libraries
        $this->load->library('session');
        $this->load->helper('date');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('user_agent');
        $this->load->helper('directory');
        $this->load->library('calendar');


    }

    public function single_product($id)
        {
          $data['user'] = $this->session->user;
          $this->session->product = $id;
          $user = $this->session->user['us_id'];
          $data['product_id'] = $id;
          $data['product'] = $this->single_model->get_product($id);
          $product = $this->single_model->get_product($id);
          $data['products'] = $this->single_model->get_products($user);
          $data['comments'] = $this->single_model->get_comments($id);
          $data['categories'] = $this->home_model->get_categories();
          $this->single_model->update($id,$data['product']['pr_views']);


          if (!isset($_SESSION['r_w'])) {
            $_SESSION['r_w'] = array(3);
          }
          if(in_array($product['pr_id'], $_SESSION['r_w'])){
          }else {
          if(sizeof($_SESSION['r_w']) > 3){
            array_splice($_SESSION['r_w'], 0, 1);
            array_push($_SESSION['r_w'],$product['pr_id']);
          }else{
                array_push($_SESSION['r_w'],$product['pr_id']);
          }}
          $recently_viewed = $_SESSION['r_w'];
          $data['recently_viewed'] = $this->single_model->get_recently_viewed($recently_viewed);
          print_r($recently_viewed);







          $this->load->view('single_view', $data);
        }

    public function create_comment()
    	{
        if($this->session->user) {
          $data['user'] = $this->session->user;
    		}else {
    			  $data['user'] = null;
    				redirect('account');
    		}

        $user = $this->session->user;
    		$this->single_model->create_comment($user['us_id']);
    		redirect('single/single_product/'.$this->session->product);
    	}

      public function send_message()
      	{
          if($this->session->user) {
            $data['user'] = $this->session->user;
      		}else {
      			  $data['user'] = null;
      				redirect('account');
      		}

          $user = $this->session->user;
      		$this->single_model->send_message($user['us_id']);
      		redirect('single/single_product/'.$this->session->product);
      	}



      public function newsletter()
    	{
        $id = $this->session->product;
        $currentURL = $this->session->currenturl;
    		$this->home_model->newsletter();

    		if($currentURL === 'http://localhost/ccs/single/single_product/'.$id){
          redirect('single/single_product/'.$id);
        } else{
          	redirect('home');
        }

    	}

  public function add_favorite($id,$pr_user)
  {
    $user = $this->session->user['us_id'];
	  $this->single_model->add_favorite($id,$user,$pr_user);
	  redirect('single/single_product/'.$id);
  }

  public function remove_favorite($id,$pr_user)
 {
	 $user = $this->session->user['pr_id'];
	 $this->single_model->remove_favorite($id,$pr_user);
	 redirect('single/single_product/'.$id);
 }

  public function send_product_offer()
  {
    if($this->session->user) {
      $data['user'] = $this->session->user;
    }else {
        $data['user'] = null;
        redirect('account');
    }
    $user = $this->session->user;
    $this->single_model->send_product_offer($user['us_id']);
    redirect('single/single_product/'.$this->session->product);

  }

  public function send_offer()
  {
      if($this->session->user) {
        $data['user'] = $this->session->user;
      }else {
          $data['user'] = null;
          redirect('account');
      }

      $user = $this->session->user;
      $this->single_model->send_offer($user['us_id']);
      redirect('single/single_product/'.$this->session->product);
  }


}
