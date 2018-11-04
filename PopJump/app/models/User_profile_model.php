<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }


    public function get_user($id)
    {
      $this->db->from('users');
      $this->db->where('us_id',$id);
      //$this->db->join('networks','networks.net_us =users.us_id');
      $query = $this->db->get();
            if($query->num_rows()>0)
            {
              $result = $query->row_array();
              return $result;
            }
            else return false;
    }

    public function get_networks($id)
    {
      $this->db->from('networks');
      $this->db->where('net_us',$id);
      $this->db->join('users','users.us_id =networks.net_us');
      //$this->db->join('icons','icons.name =networks.net_name');
      $query = $this->db->get();
            if($query->num_rows()>0)
            {
              $result = $query->result_array();
              return $result;
            }
            else return false;
    }

    public function update($id,$views){
         $data = array(
       'us_views' => $views+1,
       );
           $this->db->where('us_id', $id);
           $this->db->update('users', $data);
       }






}
