<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    public function get_locations_cities()
    {
      $this->db->from('cities');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }
    public function get_locations_countries()
    {
      $this->db->from('countries');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }
    public function get_locations_states()
    {
      $this->db->from('states');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }


    public function get_reports()
    {
      $this->db->from('reports');
      $this->db->join('items','items.i_id = reports.re_add');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }



    public function get_listings()
    {
      $this->db->from('items');
      $this->db->order_by('i_id', 'desc');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_categories()
    {
      $this->db->from('categories');
      $this->db->order_by("c_position", "asc");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_makes()
    {
      $this->db->from('auto_make');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_models()
    {
      $this->db->from('auto_model');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_users()
    {
      $this->db->from('users');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_comments()
    {
      $this->db->from('comments');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_advertisements()
    {
      $this->db->from('advertisements');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_advertisers()
    {
      $this->db->from('advertisers');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    //Admin categories
    public function editadvertiser($id)
    {
      $this->db->from('advertisers');
      $this->db->where('adv_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_editadvertiser() {
      $data = array(
        'u_username' => $this->input->post('u_username'),
        'u_email' => $this->input->post('u_email'),
        'u_location' => $this->input->post('u_location'),
        'u_phone' => $this->input->post('u_phone'),
    );
    return $this->db->update('users', $data, array('u_id' => $this->input->post('u_id')));
    }

    public function deleteadvertiser($id)
    {
      $this->db->delete('advertisers',array('adv_id' => $id));
    }

    public function deleteadvertisement($id)
    {
      $this->db->delete('advertisements',array('advm_id' => $id));
    }

    public function editcategory($id)
    {
      $this->db->from('categories');
      $this->db->where('c_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function addcategory($img, $icon) {
      $data = array(
        'c_name' => $this->input->post('name'),
        'c_slug' => url_title($this->input->post('name')),
        'c_img' => $img,
        'c_icon' => $icon,
    );
    return $this->db->insert('categories', $data);
  }

    public function save_editcategory($image, $icon) {

      if($image == null) {
        $data = array(
          'c_name' => $this->input->post('c_name'),
          'c_icon' => $this->input->post('c_icon'),
          'c_position' => $this->input->post('c_position'),
          'c_icon' => $icon,
      );
    } else if($icon == null) {
        $data = array(
          'c_name' => $this->input->post('c_name'),
          'c_icon' => $this->input->post('c_icon'),
          'c_position' => $this->input->post('c_position'),
          'c_img' => $image,
      );
    } else if($image == null || $icon == null) {
        $data = array(
          'c_name' => $this->input->post('c_name'),
          'c_icon' => $this->input->post('c_icon'),
          'c_position' => $this->input->post('c_position'),
      );
      } else {
        $data = array(
          'c_name' => $this->input->post('c_name'),
          'c_icon' => $this->input->post('c_icon'),
          'c_position' => $this->input->post('c_position'),
          'c_img' => $image,
          'c_icon' => $icon,
      );
      }



    return $this->db->update('categories', $data, array('c_id' => $this->input->post('c_id')));
    }

    public function deletecategory($id)
    {
      $this->db->delete('categories',array('c_id' => $id));
    }

    //Admin listings
    public function additem()
    {

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

    public function deleteitem($id)
    {
      $this->db->delete('items',array('i_id' => $id));
    }

    //Admin users
    public function addusers()
    {

    }
    public function edituser($id)
    {
      $this->db->from('users');
      $this->db->where('u_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_edituser() {
      $data = array(
        'u_username' => $this->input->post('u_username'),
        'u_email' => $this->input->post('u_email'),
        'u_location' => $this->input->post('u_location'),
        'u_phone' => $this->input->post('u_phone'),
    );
    return $this->db->update('users', $data, array('u_id' => $this->input->post('u_id')));
    }

    public function deleteuser($id)
    {
      $this->db->delete('users',array('u_id' => $id));
    }

    //Admin comments
    public function editcomment()
    {

    }
    public function deletecomment($id)
    {
      $this->db->delete('comments',array('co_id' => $id));
    }

    //Make
    public function addmake() {
      $data = array(
        'make_name' => $this->input->post('make_name'),
    );
    return $this->db->insert('auto_make', $data);
  }

  public function editmake($id)
  {
    $this->db->from('auto_make');
    $this->db->where('make_id', $id);
    $query = $this->db->get();
      if($query->num_rows() > 0){
          $result = $query->row_array();
          return $result;
      }else{
          return false;
      }
  }

  public function save_editmake() {
    $data = array(
      'make_name' => $this->input->post('make_name'),
  );
  return $this->db->update('auto_make', $data, array('make_id' => $this->input->post('make_id')));
  }

    public function deletemake($id)
    {
      $this->db->delete('auto_make',array('make_id' => $id));
    }


    //Model
    public function addmodel() {
      $data = array(
        'model_make' => $this->input->post('model_make'),
        'model_name' => $this->input->post('model_name'),
    );
    return $this->db->insert('auto_model', $data);
  }

  public function deletemodel($id)
  {
    $this->db->delete('auto_model',array('model_id' => $id));
  }

  public function editmodel($id)
  {
    $this->db->from('auto_model');
    $this->db->where('model_id', $id);
    $query = $this->db->get();
      if($query->num_rows() > 0){
          $result = $query->row_array();
          return $result;
      }else{
          return false;
      }
  }

  public function save_editmodel() {
    $data = array(
      'model_name' => $this->input->post('model_name'),
  );
  return $this->db->update('auto_model', $data, array('model_id' => $this->input->post('model_id')));
  }



    //Locations
    //Country
    public function addcountry() {
      $data = array(
        'country_name' => $this->input->post('country_name'),
    );
    return $this->db->insert('countries', $data);
    }

    public function editcountry($id)
    {
      $this->db->from('countries');
      $this->db->where('country_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_editcountry() {
      $data = array(
        'country_name' => $this->input->post('country_name'),
    );
    return $this->db->update('countries', $data, array('country_id' => $this->input->post('country_id')));
    }
    public function deletecountry($id)
    {
        $this->db->delete('countries',array('country_id' => $id));
      // delete din bazadedate cu $id
    }
    //State
    public function addstate() {
      $data = array(
        'state_name' => $this->input->post('state_name'),
        'state_country' => $this->input->post('state_country'),
    );

    return $this->db->insert('states', $data);
    }
    public function editstate($id)
    {
      $this->db->from('states');
      $this->db->where('state_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_editstate() {
      $data = array(
        'state_name' => $this->input->post('state_name'),
    );
    return $this->db->update('states', $data, array('state_id' => $this->input->post('state_id')));
    }


    public function deletestate($id)
    {
      $this->db->delete('states',array('state_id' => $id));
    }
    //City
    public function addcity() {
      $data = array(
        'city_name' => $this->input->post('city_name'),
        'city_state' => $this->input->post('city_state'),
    );

    return $this->db->insert('cities', $data);
    }

    public function editcity($id) {
      $this->db->from('cities');
      $this->db->where('city_id', $id);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function save_editcity() {
      $data = array(
        'city_name' => $this->input->post('city_name'),
    );
    return $this->db->update('cities', $data, array('city_id' => $this->input->post('city_id')));
    }

    public function deletecity($id)
    {
      $this->db->delete('cities',array('city_id' => $id));
    }


    public function get_settings() {
      $this->db->from('settings');
      $this->db->where('set_id', 1);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function update_settings() {
      $data = array(
        'set_listings_per_page' => $this->input->post('set_listings_per_page'),
        'set_advertisements_per_page' => $this->input->post('set_advertisements_per_page'),
        'set_impressions_per_dollar' => $this->input->post('set_impressions_per_dollar'),
    );
    return $this->db->update('settings', $data, array('set_id' => 1));
    }



}
