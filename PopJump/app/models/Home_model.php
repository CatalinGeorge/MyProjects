<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->library('email');
        $this->load->helper('url');

    }



  public function set_user()
  {
    $data = array(
          'us_first' => strip_tags($this->input->post('first')),
          'us_last' => strip_tags($this->input->post('last')),
          'us_email' => strip_tags($this->input->post('email')),
          'us_password' => md5($this->input->post('pass')),
        );
        if($this->input->post('pass') == $this->input->post('pass_vrf')){
          return $this->db->insert('users', $data);
        }else {
          $this->session->set_flashdata('message', 'Your passwords are not matching! Please try again.');
          redirect('home');
        }

  }

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

  public function recover() {


    $condition = "us_email =" . "'" . $this->input->post('email') . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

      if ($query->num_rows() == 1) {
        $result = $query->row_array();
        $user_pass_hash = $result['us_password'];
        $user_id = $result['us_id'];
        // /return $result;
      } else {
        return false;
      }



    $this->email->set_mailtype("html");

    $this->email->from('your@example.com', 'Your Name');
    $this->email->to($this->input->post('email'));

    $this->email->subject('Popjump - Password Recovery');
    $this->email->message('<h1>Recover your lost password.</h1><p>Access the link below to modify your password. If you didn\'t reqire this action, you can ignore this message.</p><br><a href="'.base_url().'home/rpl/'.$user_id.'/'.$user_pass_hash.'"><i>'.base_url().'home/rpl/'.$user_id.'/'.$user_pass_hash.'</i></a>');

    $this->email->send();

  }

  public function recover_update_password() {

    $password = $this->input->post('password');
    $password_again = $this->input->post('password_again');
    $id = $this->input->post('id');
    $hash = $this->input->post('hash');

    $condition = "us_id =" . "'" . $id . "' AND " . "us_password =" . "'" . $hash . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

      if ($query->num_rows() == 1) {
        $data = array(
        'us_password' => md5($password),
        );
          $this->db->where('us_id', $id);
          $this->db->update('users', $data);
      } else {
        return false;
      }

    }





}
