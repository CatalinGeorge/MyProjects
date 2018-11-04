<?php
class Super_deals_model extends CI_Model {

  public function __construct()
  {
          $this->load->database();
  }


  public function get_products()
      {
        $query = $this->db->get_where('products', array('pr_featured' => 1));
        return $query->result_array();
      }

  public function search()
      {
            $this->db->like('pr_name',$this->input->post('search'));
            $query = $this->db->get('products');
            return $query->result_array();
      }













}
