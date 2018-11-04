<?php
class Home_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }




        public function get_products()
            {
              $this->db->from('products');
              $this->db->order_by("products.pr_id", "desc");
              // $this->db->limit('4');
              $query = $this->db->get();
                if($query->num_rows() > 0){
                    $result = $query->result_array();
                    return $result;
                }else{
                    return false;
                }
            }

      public function get_categories()
            {
              $this->db->from('categories');
              $this->db->where('cat_level', '1');
              $this->db->order_by("categories.cat_id", "asc");
              $query = $this->db->get();
                if($query->num_rows() > 0){
                    $result = $query->result_array();
                    return $result;
                }else{
                    return false;
                }
            }

            public function search_category()
              {
                  $this->db->like('pr_name',$this->input->post('search'));
                  $this->db->like('pr_category',$this->input->post('categories'));
                  //$this->db->join('providers', 'providers.pr_id = products.prd_user');
                  $this->db->join('categories', 'categories.cat_id = products.pr_category');
                  $query = $this->db->get('products');
                  return $query->result_array();
              }

            public function newsletter()
                {
                  $data=array(
                    'ne_email' =>$this->input->post('email'),
                  );
                  return $this->db->insert('newsletter',$data);

                }










}
