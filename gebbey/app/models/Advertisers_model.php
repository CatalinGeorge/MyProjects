<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisers_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }


  public function login_advertiser() {

      $data = array(
        'email' => strip_tags($this->input->post('email')),
        'password' => md5($this->input->post('password')),
      );

    $condition = "adv_email =" . "'" . $data['email'] . "' AND " . "adv_password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('advertisers');
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

    public function login_mobile($email, $password) {
      $condition = "adv_email =" . "'" . $email . "' AND " . "adv_password =" . "'" . md5($password) . "'";
      $this->db->select('*');
      $this->db->from('advertisers');
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

    public function set_advertiser()
    {

        $data = array(
          'adv_email' => strip_tags($this->input->post('email')),
          'adv_username' => strip_tags($this->input->post('username')),
          'adv_password' => md5($this->input->post('password')),
          'adv_location' => strip_tags($this->input->post('location')),
          'adv_added' => date('y-m-d'),
        );

        return $this->db->insert('advertisers', $data);
    }

    public function register_mobile($email, $username, $password, $location, $lat, $lon, $phone)
    {

        $data = array(
          'adv_email' => strip_tags($email),
          'adv_username' => strip_tags($username),
          'adv_password' => md5($password),
          'adv_location' => strip_tags($location),
          'adv_added' => date('y-m-d'),
        );

        return $this->db->insert('advertisers', $data);
    }


    public function get_advertisements($id)
        {
          $query = $this->db->get_where('advertisements', array('advm_advertisers' => $id));
          return $query->result_array();
        }



    public function deleteadvertisement($id)
    {
      $this->db->delete('advertisements',array('advm_id' => $id));
    }

    public function updateviews($id,$views){
              $data = array(
            'advm_numofviews' => $views+1 ,
            );
                $this->db->where('advm_id', $id);
                $this->db->update('advertisements', $data);
            }

        public function add_advertisement($user,$img)
            {
            $data = array(
            'advm_name' => $this->input->post('addname'),
            'advm_description' => $this->input->post('description'),
            'advm_budget' => $this->input->post('budget'),
            'advm_numofdays' => $this->input->post('numofdays'),
            'advm_url_address' => $this->input->post('url'),
            'advm_impressions' => $this->input->post('budget')*1000,
            'advm_image' => $img,
            'advm_advertisers' => $user
            );
            return $this->db->insert('advertisements', $data);
            }

        public function see_advertisement($id)
      {
        $query = $this->db->get_where('advertisements', array('advm_id' => $id));
        return $query->row_array();
      }

}
