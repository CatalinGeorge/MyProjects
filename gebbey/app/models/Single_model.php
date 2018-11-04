<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Single_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function get_item($slug)
    {
      $this->db->from('items');
      $this->db->where('i_slug', $slug);
      $this->db->join('users', 'users.u_id = items.i_user');
      $this->db->join('cities', 'cities.city_id = items.i_city');
      $this->db->order_by("items.i_id", "desc");
      $this->db->limit(1);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();

            $hit = $result['i_views'] + 1;
            $data = array(
                  'i_views' => $hit,
          );
            $this->db->update('items', $data, array('i_slug' => $slug));

            return $result;
        }else{
            return false;
        }
    }


    public function get_related($cat, $city) {
        $this->db->from('items');
        $this->db->where('i_category', $cat);
        $this->db->where('i_city', $city);
        $this->db->join('users', 'users.u_id = items.i_user');
        $this->db->join('cities', 'cities.city_id = items.i_city');
        $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
        $this->db->order_by('rand()');
        $this->db->limit(5);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_related_w($cat, $city) {
        $this->db->from('items');
        $this->db->where('i_category', $cat);
        $this->db->where('i_city', $city);
        $this->db->join('users', 'users.u_id = items.i_user');
        $this->db->join('cities', 'cities.city_id = items.i_city');
        $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
        $this->db->order_by('rand()');
        $this->db->limit(4);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_specials($list, $cat) {

      $this->db->from('sp_real_estate');

      if($cat == 1) { // Real estate specials
        //$this->db->from('sp_real_estate');
        $this->db->where('spre_list', $list);
      }
      if($cat == 2) { // Jobs specials
        $this->db->from('sp_jobs');
        $this->db->where('spjo_list', $list);
      }
      if($cat == 5) { // Automobile specials
        $this->db->from('sp_automobile');
        $this->db->where('spau_list', $list);
        $this->db->join('auto_make', 'auto_make.make_id = sp_automobile.spau_make');
        $this->db->join('auto_model', 'auto_model.model_id = sp_automobile.spau_model');
      }
      if($cat == 6) { // Events specials
        $this->db->from('sp_events');
        $this->db->where('spev_list', $list);
      }
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function add_report()
    {
      $data = array(
        're_reason' =>$this->input->post('reason'),
        're_add' =>$this->input->post('item')
    );
      return $this->db->insert('reports', $data);
    }

}
