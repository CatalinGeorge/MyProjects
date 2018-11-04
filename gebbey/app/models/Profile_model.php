<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function get_items($user) {

      $this->db->from('items');
      $this->db->where('i_user', $user);
      $this->db->order_by('i_id', 'desc');
      $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
      //$this->db->join('countries', 'countries.country_id = items.i_country');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_user($user)
    {
      $this->db->from('users');
      $this->db->where('u_id', $user);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_comments($user)
    {
      $this->db->from('comments');
      $this->db->where('co_listing_user', $user);
      $this->db->order_by('co_id', 'desc');
      $this->db->join('users', "users.u_id = comments.co_user");
      $this->db->join('items', "items.i_id = comments.co_listing");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function edititem($id)
    {
      $this->db->from('items');
      $this->db->where('i_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_edititem() {
      $data = array(
        'i_name' => $this->input->post('i_name'),
        'i_price' => $this->input->post('i_price'),
        'i_description' => $this->input->post('i_description'),
        'i_phone' => $this->input->post('i_phone'),
        'i_email' => $this->input->post('i_email'),
        'i_address' => $this->input->post('i_address'),
    );
    return $this->db->update('items', $data, array('i_id' => $this->input->post('i_id')));
    }


    public function update_item_mobile($id, $name, $description, $price, $address, $phone, $email) {
      $data = array(
        'i_name' => $name,
        'i_price' => $price,
        'i_description' => $description,
        'i_phone' => $phone,
        'i_email' => $email,
        'i_address' => $address,
    );
    return $this->db->update('items', $data, array('i_id' => $id));
    }

    public function deleteitem($id)
    {
      $this->db->delete('items',array('i_id' => $id));
    }


    public function update_user()
    {

        $data = array(
          'u_email' => strip_tags($this->input->post('email')),
          'u_username' => strip_tags($this->input->post('username')),
          // 'u_location' => strip_tags($this->input->post('location')),
          'u_phone' => strip_tags($this->input->post('phone')),
          // 'u_lat' => strip_tags($this->input->post('lat')),
          // 'u_lon' => strip_tags($this->input->post('lon')),
          // 'u_added' => date('y-m-d'),
          // 'u_avatar' => 'avatar.jpg',
        );
        //print_r($data);
        return $this->db->update('users', $data, array('u_id' => $this->input->post('user_id')));
        // $this->db->where('u_id', $this->input->post('user_id'));
        // return $this->db->update('users', $data);
    }

    public function user_comments($user) {
      $this->db->from('comments');
      $this->db->where('co_listing_user', $user);
      $this->db->where('co_read', 0);
      $this->db->join('users', "users.u_id = comments.co_user");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }


}
