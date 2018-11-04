<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    // Read data using username and password
  public function login_user() {
    //$id = $this->input->post('id');
    $idd = $this->input->post('id');
    $search = '@gebeyapp.com';
    $trimmed = str_replace($search, '', $idd) ;
      $data = array(
        'id' =>  $trimmed,
        'password' => md5($this->input->post('password')),
      );


    $condition = "u_userid =" . "'" . $data['id'] . "' AND " . "u_password =" . "'" . $data['password'] . "'";
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

    public function login_mobile($userid, $password) {
      $condition = "u_userid =" . "'" . $userid . "' AND " . "u_password =" . "'" . md5($password) . "'";
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

    public function check_username($username) {
      $condition = "u_userid =" . "'" . $username . "'";
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

        if ($query->num_rows() == 1) {
          return true;
        } else {
          return false;
        }
    }


}
