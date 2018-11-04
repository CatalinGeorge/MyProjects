<?php
class Categories_model extends CI_Model {

  public function __construct()
  {
          $this->load->database();
  }


  public function get_products($id)
      {
        $query = $this->db->get_where('products', array('pr_category' => $id));
        return $query->result_array();
      }

  public function search()
      {
            $this->db->like('pr_name',$this->input->post('search'));
            $query = $this->db->get('products');
            return $query->result_array();
      }

  public function get_cat_lvl1($id)
      {
          $this->db->from('categories');
          $this->db->where('cat_parent', $id);
          $this->db->where('cat_level', '2');
          $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                return $result;
            }else{
                return false;
            }
      }

  public function get_cat_lvls($id)
  {
      $this->db->from('categories');
      $this->db->where('cat_parent', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
  }

  public function get_products_tags($id)
  {
      $this->db->from('products');
      //$this->db->where_in('pr_tags', 'plums');
      $this->db->where("`pr_tags` LIKE '%$id%'");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
  }













}
