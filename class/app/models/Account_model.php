<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    // Read data using username and password
  public function login_user() {

      $data = array(
        'email' => strip_tags($this->input->post('email')),
        'pass' => md5($this->input->post('pass')),
      );

    $condition = "us_email =" . "'" . $data['email'] . "' AND " . "us_password =" . "'" . $data['pass'] . "'";
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

    public function set_user()
    {
        $data = array(
          'us_email' => strip_tags($this->input->post('email')),
          'us_username' => strip_tags($this->input->post('name')),
          'us_password' => md5($this->input->post('pass')),
          'us_added' => date('y-m-d'),
        );

        return $this->db->insert('users', $data);
    }



}
