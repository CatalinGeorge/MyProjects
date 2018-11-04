<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function set_user()
    {

        $data = array(
          'u_email' => strip_tags($this->input->post('email')),
          'u_username' => strip_tags($this->input->post('username')),
          'u_password' => md5($this->input->post('password')),
          //'u_location' => strip_tags($this->input->post('location')),
          'u_phone' => strip_tags($this->input->post('phone')),
          'u_country' => strip_tags($this->input->post('country')),
          'u_city' => strip_tags($this->input->post('city')),
          'u_state' => strip_tags($this->input->post('state')),
          //'u_lat' => strip_tags($this->input->post('lat')),
          //'u_lon' => strip_tags($this->input->post('lon')),
          'u_added' => date('y-m-d'),
          'u_avatar' => 'avatar.jpg',
          'u_userid' => strip_tags($this->input->post('userid')),
        );

        return $this->db->insert('users', $data);
    }

    public function register_mobile($data)
    {
        return $this->db->insert('users', $data);
    }


}
