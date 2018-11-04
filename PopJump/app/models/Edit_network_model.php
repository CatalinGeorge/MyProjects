<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_network_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function edit($id)
    {
      $this->db->from('networks');
      $this->db->where('net_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_edit_network()
    {
        $data = array(
          'net_name_user' => $this->input->post('net_name_user'),
          'net_url' => $this->input->post('net_url'),
      );
    return $this->db->update('networks', $data, array('net_id' => $this->input->post('net_id')));
  }






}
