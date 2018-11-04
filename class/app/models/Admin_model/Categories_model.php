<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_categories()
          {
            $this->db->from('categories');
            $query = $this->db->get();
              if($query->num_rows() > 0){
                  $result = $query->result_array();
                  return $result;
              }else{
                  return false;
              }
          }

  public function add_category()
            {
              $data=array(
                'cat_name' =>$this->input->post('category'),
              );
              return $this->db->insert('categories',$data);
            }


            public function get_subcategories($main) {
              $this->db->from('subcategories');
              $this->db->where('scat_main_category', $main);
              $query = $this->db->get();
                if($query->num_rows() > 0){
                    $result = $query->row_array();
                    return $result;
                }else{
                    return false;
                }
            }

            public function update_subcategory($json, $main) {
              $data = array(
                'scat_json' => $json,
            );
            $this->db->update('subcategories', $data, array('scat_main_category' => $main));
              }






}
