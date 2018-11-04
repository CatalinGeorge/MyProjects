<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function edituser($id)
    {
      $this->db->from('users');
      $this->db->where('us_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }


    public function save_edituser($image) {
      $user = $this->session->user['us_id'];
    if($image == null){
      $data = array(
        'us_first' => $this->input->post('first'),
        'us_last' => $this->input->post('last'),
        'us_email' => $this->input->post('email'),
        'us_description' => $this->input->post('description'),
    );
    }else{
      $data = array(
        'us_first' => $this->input->post('first'),
        'us_last' => $this->input->post('last'),
        'us_email' => $this->input->post('email'),
        'us_description' => $this->input->post('description'),
        'us_img' =>$image,
    );
    }

  return $this->db->update('users', $data, array('us_id' => $user));
}

/*  public function save_edituserr()
  {
    $data = array(
      'us_first' => $this->input->post('first'),
      'us_last' => $this->input->post('last'),
      'us_email' => $this->input->post('email'),
      'us_description' => $this->input->post('description'),
    );
  return $this->db->update('users', $data, array('us_id' => $this->input->post('us_id')));
}*/


}
