<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function send_message($user)
      {
      $data = array(
      'me_message' => $this->input->post('message'),
      'me_to' => $this->input->post('to'),
      'me_from' => $user,
      );
      return $this->db->insert('messages', $data);
      }

    public function get_products($id)
    {
      $this->db->from('products');
      $this->db->where('pr_user', $id);
      //$this->db->join('users','users.us_id =products.pr_user');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_user($id)
    {
      $this->db->from('users');
      $this->db->where('us_id', $id);
    //  $this->db->join('users','users.us_id =products.pr_user');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function count_products($id)
    {
      $this->db->where('pr_user',$id);
      return $this->db->count_all_results('products');
    }















}
