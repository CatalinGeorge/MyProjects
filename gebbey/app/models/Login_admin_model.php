<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    // Read data using username and password
  public function login_admin() {
      $data = array(
        'id' =>  strip_tags($this->input->post('id')),
        'password' => md5($this->input->post('password')),
      );


    $condition = "u_email =" . "'" . $data['id'] . "' AND " . "u_password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

      if ($query->num_rows() == 1) {
        $result = $query->row_array();
        return $result;
      } else {
        return false;
      }
    }



}
