<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function get_favorites($user)
    {

        $this->db->from('favorite_products');
        $this->db->where('fp_user', $user);
        $this->db->join('users','users.us_id =favorite_products.fp_product_user');
        $this->db->join('products','products.pr_id =favorite_products.fp_product');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }

    public function add_reply($user)
      {
        $data=array(
          'mr_message' =>$this->input->post('message'),
          'mr_from' =>$user,
          'mr_to' =>$this->input->post('us_id'),
          'mr_msg_id' =>$this->input->post('msg_id'),

        );
        return $this->db->insert('messages_replies',$data);
      }

    public function get_product_offers($user)
    {

        $this->db->from('product_offers');
        $this->db->where('po_to', $user);
        $this->db->where('po_state', 0);
        $this->db->join('users','users.us_id =product_offers.po_user');
        $this->db->join('products','products.pr_id =product_offers.po_offer_product');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }



    public function get_offers($user)
    {

        $this->db->from('offers');
        $this->db->where('of_to', $user);
        $this->db->where('of_state', 0);
        $this->db->join('users','users.us_id =offers.of_from');
        $this->db->join('products','products.pr_id =offers.of_product');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }

    public function get_messages($user)
    {

        $this->db->from('messages');
        $this->db->where('me_to', $user);
        $this->db->or_where('me_from', $user);
        $this->db->join('users','users.us_id =messages.me_from');
        $this->db->join('products','products.pr_id =messages.me_prd');
        $this->db->order_by('me_id', 'DESC');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }

    public function get_replies($user)
    {

        $this->db->from('messages_replies');
        $this->db->join('users','users.us_id =messages_replies.mr_from');

        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }

    public function get_products($user)
    {

        $this->db->from('products');
        $this->db->where('pr_user', $user);
        //$this->db->join('users','users.us_id =products.pr_user');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }


    public function edit_profile($image) {
      $user = $this->session->user['us_id'];
        if($image == null){
          $data = array(
            'us_username' => $this->input->post('username'),
            'us_location' => $this->input->post('location'),
            'us_phone' => $this->input->post('phone'),

        );
        }else{
          $data = array(
            'us_username' => $this->input->post('username'),
            'us_location' => $this->input->post('location'),
            'us_phone' => $this->input->post('phone'),
            'us_avatar' =>$image,
        );
        }

      return $this->db->update('users', $data, array('us_id' => $user));
    }

    public function count_favorites($user)
     {
       $this->db->where('fp_user',$user);
       return $this->db->count_all_results('favorite_products');
     }

    public function count_products($user)
     {
       $this->db->where('pr_user',$user);
       return $this->db->count_all_results('products');
     }

     public function count_messages($user)
      {
        $this->db->where('me_to',$user);
        $this->db->or_where('me_from', $user);
        return $this->db->count_all_results('messages');
      }

      public function count_offers($user)
       {
         $this->db->where('of_to',$user);
         $this->db->where('of_state', 0);
         return $this->db->count_all_results('offers');
       }

       public function count_product_offers($user)
        {
          $this->db->where('po_to',$user);
          $this->db->where('po_state', 0);
          return $this->db->count_all_results('product_offers');
        }

    public function remove_offer($id,$user)
    {
      $this->db->where('of_to', $user);
      $this->db->delete('offers',array('of_id' => $id));
    }

    public function remove_product_offer($id,$user)
    {
      $this->db->where('po_to', $user);
      $this->db->delete('product_offers',array('po_id' => $id));
    }

     public function get_product($id)
           {
             $this->db->from('products');
             $this->db->where('pr_id', $id);
             $query = $this->db->get();
               if($query->num_rows() > 0){
                   $result = $query->row_array();
                   return $result;
               }else{
                   return false;
               }
           }

  public function save_edit_product()
  {
    $data = array(
      'pr_name' => $this->input->post('name'),
      'pr_price' => $this->input->post('price'),
      'pr_description' => $this->input->post('description'),
      'pr_category' => $this->input->post('categories'),
      'pr_display_size' =>$this->input->post('display_size'),
      'pr_display_type' =>$this->input->post('display_type'),
      'pr_hd_size' =>$this->input->post('hd_size'),
      'pr_proc_type' =>$this->input->post('proc_type'),
      'pr_ram_size' =>$this->input->post('ram_size'),
      'pr_weight' =>$this->input->post('weight'),
      'pr_os' =>$this->input->post('os'),
      'pr_baterry_life' =>$this->input->post('baterry_life'),
  );
  return $this->db->update('products', $data, array('pr_id' => $this->input->post('pr_id')));
  }

  public function take_offer($id){
          $data = array(
            'of_state' => +1 ,
            );
            $this->db->where('of_id', $id);
            $this->db->update('offers', $data);
        }

  public function take_product_offer($id)
  {
    $data = array(
      'po_state' => +1 ,
      );
      $this->db->where('po_id', $id);
      $this->db->update('product_offers', $data);
  }

  public function remove_favorite($id,$user)
    {
      $this->db->where('fp_user', $user);
      $this->db->delete('favorite_products',array('fp_product' => $id));
    }








}
