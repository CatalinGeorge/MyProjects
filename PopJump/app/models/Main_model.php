<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }


    public function get_profiles()
    {
          $this->db->from('users');
          $this->db->where('us_set_pop', '1');
          $this->db->where('us_set_block', '0');
          $this->db->order_by('us_set_order');
          //$this->db->join('networks', 'networks.net_us = users.us_id');
        //  $this->db->order_by("users.us_id", "desc");
          //$this->db->limit('12');
          $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                return $result;
            }else{
                return false;
            }
    }

    public function search()
    {
      $s_query = $this->input->post('search_query');

      // break search phrase into keywords
      $keywords = explode(' ', $s_query);

      // Build query
      foreach ($keywords as $keyword)
      {
          $this->db->or_where("`us_first` LIKE '%$keyword%'");
          $this->db->or_where("`us_last` LIKE '%$keyword%'");
      }
      $query = $this->db->order_by("us_set_pop", "desc");
      $query = $this->db->get('users');

      $result = $query->result_array();
      return $result;
    }














}
