<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_product_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

    // public function get_baterry_life()
    //       {
    //         $this->db->from('baterry_life');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_os()
    //       {
    //         $this->db->from('operating_system');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_display_type()
    //       {
    //         $this->db->from('display_type');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_weight()
    //       {
    //         $this->db->from('weight');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_hd_size()
    //       {
    //         $this->db->from('hd_size');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_proc_type()
    //       {
    //         $this->db->from('proc_type');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_ram_size()
    //       {
    //         $this->db->from('ram_size');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }
    //
    // public function get_display_size()
    //       {
    //         $this->db->from('display_size');
    //         $query = $this->db->get();
    //           if($query->num_rows() > 0){
    //               $result = $query->result_array();
    //               return $result;
    //           }else{
    //               return false;
    //           }
    //       }


    public function get_main_categories()
    {
      $this->db->from('categories');
      $this->db->where('cat_level', '1');
          $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                return $result;
            }else{
                return false;
            }
    }

    public function get_other_categories()
    {
      $this->db->from('categories');
    //  $this->db->where('cat_parent', $id);
          $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                return $result;
            }else{
                return false;
            }
    }





    public function create_product($user,$path){
    $tags = $this->input->post('tags');
    $tags = implode(",", $tags);
                {
                  $data=array(
                    'pr_category' =>$this->input->post('categories'),
                    'pr_name' =>$this->input->post('name'),
                    'pr_price' =>$this->input->post('price'),
                    'pr_description' =>$this->input->post('description'),
                    'pr_added' =>date('y-m-d h:i:sa'),
                    'pr_tags' =>$tags,
                    'pr_user' =>$user,
                    'pr_media' =>$path,
                  );
                  return $this->db->insert('products',$data);

                }
              }







}
