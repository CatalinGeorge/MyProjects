<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

    public function count($table, $cat) {
      $this->db->where('i_category', $cat);
      return $this->db->count_all_results($table);
    }

    public function get_items($start, $step)
    {
      $this->db->from('items');
      $this->db->join('users', 'users.u_id = items.i_user');
      $this->db->join('cities', 'cities.city_id = items.i_city');
      $this->db->order_by("items.i_id", "desc");
      $this->db->limit($step, $start);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            echo $results;
            return $result;
        }else{
            return false;
        }
    }

    public function search_simple($cat)
      {
          $this->db->where('i_category', $cat);
          $this->db->like('i_name',$this->input->post('search'));
          $this->db->join('users', 'users.u_id = items.i_user');
          $this->db->join('cities', 'cities.city_id = items.i_city');
          $query = $this->db->get('items');
          return $query->result_array();
      }

    public function get_categories()
    {

      $final = array();
      $x = 0;

      $this->db->from('categories');
      $this->db->order_by("c_position", "asc");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();

            foreach ($result as $row)
            {

              $count = $this->get_category_count($row['c_slug']);
               //echo $row['c_slug'];
               //echo $count;

               $final[$x]['cat'] = $row;
               $final[$x]['count'] = $count;

               $x++;

            }
            return $final;
        }else{
            return false;
        }
    }

    public function get_category_count($cat) {
      $condition = "i_category =" . "'" . $cat . "'";
      $this->db->select('*');
      $this->db->from('items');
      $this->db->where($condition);
      return $this->db->count_all_results();
    }

    public function get_category($cat)
    {
      $this->db->from('categories');
      $this->db->where("c_slug", $cat);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }

    public function set_items($media_folder, $upload_data)
    {

      $this->upload_images($media_folder, $upload_data);

      $last_row = $this->db->order_by('i_id',"desc")->limit(1)->get('items')->row('i_id');

        $data = array(
          'i_name' => $this->input->post('name'),
          'i_slug' => 1+$last_row.'-'.url_title($this->input->post('name')),
          'i_price' => $this->input->post('price'),
          'i_description' => $this->input->post('description'),
          'i_category' => $this->input->post('category'),
          'i_user' => $this->input->post('user'),
          'i_views' => 0,
          'i_added' => date('y-m-d h:m:s'),
          'i_featured' => 0,
          'i_status' => 1,
          'i_media' => $media_folder,
          'i_country' => $this->input->post('country'),
          'i_city' => $this->input->post('city'),
          'i_state' => $this->input->post('state'),
          'i_address' => $this->input->post('address'),
          'i_email' => $this->input->post('email'),
          'i_phone' => $this->input->post('phone'),
        );

        $this->db->insert('items', $data);

        return $this->db->insert_id();
    }

    public function set_specials($cat, $list) {

      if($cat == 1) { // Real estate category specials
        $data = array(
          'spre_type' => $this->input->post('type'),
          'spre_rentsale' => $this->input->post('rentsale'),
          'spre_list' => $list,
        );
        $this->db->insert('sp_real_estate', $data);
      }

      if($cat == 2) { // Jobs category specials
        $data = array(
          'spjo_company' => $this->input->post('company'),
          'spjo_job_title' => $this->input->post('job_title'),
          'spjo_qualification' => $this->input->post('qualification'),
          'spjo_deadline' => $this->input->post('deadline'),
          'spjo_list' => $list,
        );
        $this->db->insert('sp_jobs', $data);
      }

      if($cat == 5) { // Automobile category specials
        $data = array(
          'spau_make' => $this->input->post('make'),
          'spau_model' => $this->input->post('model'),
          'spau_mileage' => $this->input->post('mileage'),
          'spau_body' => $this->input->post('body'),
          'spau_color' => $this->input->post('color'),
          'spau_list' => $list,
        );
        $this->db->insert('sp_automobile', $data);
      }

      if($cat == 6) { // Events category specials
        $data = array(
          'spev_company' => $this->input->post('company'),
          'spev_startdate' => $this->input->post('startdate'),
          'spev_starttime' => $this->input->post('starttime'),
          'spev_list' => $list,
        );
        $this->db->insert('sp_events', $data);
      }

    }

    public function upload_images($media_folder, $upload_data) {
      $x = 1;
      foreach($upload_data as $img)
      {

if($x==1) {
  $dataimgs = array(
    'me_img' => $img['file_name'],
    'me_dir' => $media_folder,
    'me_cover' => 1
  );
  $x=2;
} else {
  $dataimgs = array(
    'me_img' => $img['file_name'],
    'me_dir' => $media_folder,
    'me_cover' => 0
  );
}


        $this->db->insert('media', $dataimgs);
      }
    }

    public function set_comment($comment,$user,$listing, $listing_user)
    {

        $data = array(
          'co_comment' => $this->input->post('comment'),
          'co_user' => $this->input->post('user'),
          'co_listing' => $this->input->post('listing'),
          'co_listing_user' => $this->input->post('listing_user'),
        );

        return $this->db->insert('comments', $data);

    }

    public function set_comment_mobile($comment,$user,$listing, $listing_user)
    {
      $this->db->from('items');
      $this->db->where('i_id', $listing);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
          }
          $listing_user = $result['i_user'];


        $data = array(
          'co_comment' => urldecode($comment),
          'co_user' => $user,
          'co_listing' => $listing,
          'co_listing_user' => $listing_user,
        );

        return $this->db->insert('comments', $data);

    }


    public function get_itemscategory($cat, $start, $step)
    {
      $this->db->from('items');
      $this->db->where('i_category', $cat);
      $this->db->join('users', 'users.u_id = items.i_user');
      $this->db->join('categories', 'categories.c_slug = items.i_category');
      $this->db->join('cities', 'cities.city_id = items.i_city');
      $this->db->order_by("items.i_id", "desc");
      $this->db->limit($step, $start);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }


    public function get_itemscategory_mobile($cat, $start, $step)
    {
      $this->db->from('items');
      $this->db->where('i_category', $cat);
      $this->db->join('users', 'users.u_id = items.i_user');
      $this->db->join('categories', 'categories.c_slug = items.i_category');
      $this->db->join('countries', 'countries.country_id = items.i_country');
      $this->db->join('states', 'states.state_id = items.i_state');
      $this->db->join('cities', 'cities.city_id = items.i_city');
      $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
      $this->db->order_by("items.i_id", "desc");
      $this->db->limit($step, $start);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }



    public function update_advertisement_views($id, $views) {
      $data = array(
        'advm_numofviews' => $views+1,
    );
    return $this->db->update('advertisements', $data, array('advm_id' => $id));
    }

    public function update_advertisement_clicks($id, $clicks) {
      $data = array(
        'advm_clicks' => $clicks+1,
    );
    return $this->db->update('advertisements', $data, array('advm_id' => $id));
    }

    public function get_advertisements($last, $step) {

      $last_advm_id = $this->get_last_advm_id();
      $first_advm_id = $this->get_first_advm_id();

      $this->db->from('advertisements');
      $this->db->where('advm_impressions >', 'advm_numofviews');
      $this->db->where('advm_id >', $last);
      $this->db->limit($step);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            $this->update_last_advm_id($result[count($result)-1]['advm_id']);
            foreach($result as $ad):
              if($ad['advm_id'] == $last_advm_id['advm_id']) {
                $this->update_last_advm_id($first_advm_id['advm_id']);
              }
              $this->update_advertisement_views($ad['advm_id'], $ad['advm_numofviews']);
            endforeach;
            return $result;
        }else{
            return false;
        }
    }

    public function get_last_advm_id() {
      $this->db->from('advertisements');
      $this->db->where('advm_impressions >', 'advm_numofviews');
      $this->db->order_by("advm_id", "desc");
      $this->db->limit(1);
      $query = $this->db->get();
        if($query->num_rows() > 0){
          $result = $query->row_array();
          return $result;
        }
    }

    public function get_first_advm_id() {
      $this->db->from('advertisements');
      $this->db->where('advm_impressions >', 'advm_numofviews');
      $this->db->order_by("advm_id", "asc");
      $this->db->limit(1);
      $query = $this->db->get();
        if($query->num_rows() > 0){
          $result = $query->row_array();
          return $result;
        }
    }

    public function update_last_advm_id($id) {
      $data = array(
        'set_advertisement_last_id' => $id,
    );
    return $this->db->update('settings', $data, array('set_id' => '1'));
    }

    public function get_advertisement_details($id) {
      $this->db->from('advertisements');
      $this->db->where('advm_id', $id);
      $this->db->limit(1);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;

        }else{
            return false;
        }
    }


    public function get_media($media)
    {

      $this->db->from('media');
      $this->db->where('me_dir', $media);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;

        }else{
            return false;
        }


    }


    public function get_states($country)
    {
      $this->db->from('states');
      $this->db->where('state_country', $country);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_cities($state)
    {
      $this->db->from('cities');
      $this->db->where('city_state', $state);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_models($make)
    {
      $this->db->from('auto_model');
      $this->db->where('model_make', $make);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function get_comments($id)
    {
      $this->db->from('comments');
      $this->db->join('users','users.us_id =comments.co_user');
      $this->db->order_by("co_id", "desc");
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    function search()
    {
        $this->db->like('i_name',$this->input->post('search'));
        $this->db->join('users', 'users.u_id = items.i_user');
        $this->db->join('categories', 'categories.c_slug = items.i_category');
        $query = $this->db->get('items');
        return $query->result_array();
    }
    /*
    $this->db->from('items');
    $this->db->where('i_category', $cat);
    $this->db->join('users', 'users.u_id = items.i_user');
    $this->db->join('categories', 'categories.c_slug = items.i_category');
    $this->db->join('countries', 'countries.country_id = items.i_country');
    $this->db->join('states', 'states.state_id = items.i_state');
    $this->db->join('cities', 'cities.city_id = items.i_city');
    $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
    $this->db->order_by("items.i_id", "desc");
    $this->db->limit($step, $start);
    $query = $this->db->get();
      if($query->num_rows() > 0){
          $result = $query->result_array();
          return $result;
      }else{
          return false;
      }
    */

    function search_mobile($terms)
    {
        $this->db->like('i_name',$terms);
        $this->db->join('users', 'users.u_id = items.i_user');
        $this->db->join('categories', 'categories.c_slug = items.i_category');
        $this->db->join('media', "(items.i_media = media.me_dir) and (media.me_cover = '1')", "left outer");
        $query = $this->db->get('items');
        return $query->result_array();
    }


    public function get_user($id) {
      $condition = "u_id =" . "'" . $id . "'";
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

    public function max_price($cat) {
      $condition = "i_category =" . "'" . $cat . "'";
      $this->db->select_max('i_price');
      $this->db->where($condition);
      $queryz = $this->db->get('items');
      if($queryz->num_rows() > 0){
          $resultz = $queryz->row_array();
          return $resultz['i_price'];
      }else{
          return false;
      }
    }

    public function filters($cat)
    {

        $condition = "i_category =" . "'" . $cat . "'";
        $this->db->from('items');
        $this->db->join('sp_automobile', 'sp_automobile.spau_list = items.i_id');
        $this->db->where($condition);
        $this->db->where('i_price <', $this->input->post('price_max'));
        $this->db->where('i_price >', $this->input->post('price_min'));

        if($this->input->post('country') !== null) {
          $this->db->where('i_country', $this->input->post('country'));
        }
        if($this->input->post('state') !== null) {
          $this->db->where('i_state', $this->input->post('state'));
        }
        if($this->input->post('city') !== null) {
          $this->db->where('i_city', $this->input->post('city'));
        }
        if($this->input->post('make') !== null) {
          $this->db->where('spau_make', $this->input->post('make'));
        }
        if($this->input->post('model') !== null) {
          $this->db->where('spau_model', $this->input->post('model'));
        }




        $this->db->join('users', 'users.u_id = items.i_user');
        $this->db->join('categories', 'categories.c_slug = items.i_category');
        $this->db->join('cities', 'cities.city_id = items.i_city');
        $this->db->order_by("items.i_id", "desc");

        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }
    }




    public function set_items_mobile($product_data=array(), $product_specials=array(), $key)
    {

      $last_row = $this->db->order_by('i_id',"desc")->limit(1)->get('items')->row('i_id');

      $cat = $product_data['product_category_id'];

        $data = array(
          'i_name' => $product_data['product_name'],
          'i_slug' => 1+$last_row.'-'.url_title($product_data['product_name']),
          'i_price' => $product_data['product_price'],
          'i_description' => $product_data['product_description'],
          'i_category' => $product_data['product_category'],
          'i_user' => $product_data['product_user'],
          'i_views' => 0,
          'i_added' => date('y-m-d h:m:s'),
          'i_featured' => 0,
          'i_status' => 1,
          'i_media' => $key,
          'i_country' => $product_data['product_country'],
          'i_city' => $product_data['product_city'],
          'i_state' => $product_data['product_state'],
          'i_address' => $product_data['product_address'],
          'i_email' => $product_data['product_email'],
          'i_phone' => $product_data['product_phone'],
        );


        $this->db->insert('items', $data);

        $list = $this->db->insert_id();


        // Specials

        if($cat == 1) { // Real estate category specials
          $data = array(
            'spre_type' => $product_specials['product_type'],
            'spre_rentsale' => $product_specials['product_rentsale'],
            'spre_list' => $list,
          );
          $this->db->insert('sp_real_estate', $data);
        }

        if($cat == 2) { // Jobs category specials
          $data = array(
            'spjo_company' => $product_specials['product_company'],
            'spjo_job_title' => $product_specials['product_job_title'],
            'spjo_qualification' => $product_specials['product_qualification'],
            'spjo_deadline' => $product_specials['product_deadline'],
            'spjo_list' => $list,
          );
          $this->db->insert('sp_jobs', $data);
        }

        if($cat == 5) { // Automobile category specials
          $data = array(
            'spau_make' => $product_specials['product_make'],
            'spau_model' => $product_specials['product_model'],
            'spau_mileage' => $product_specials['product_mileage'],
            'spau_body' => $product_specials['product_body'],
            'spau_color' => $product_specials['product_color'],
            'spau_year_made' => $product_specials['product_year_made'],
            'spau_list' => $list,
          );
          $this->db->insert('sp_automobile', $data);
        }

        if($cat == 6) { // Events category specials
          $data = array(
            'spev_company' => $product_specials['product_events_company'],
            'spev_startdate' => $product_specials['product_events_startdate'],
            'spev_starttime' => $product_specials['product_events_starttime'],
            'spev_list' => $list,
          );
          $this->db->insert('sp_events', $data);
        }

    }

    public function set_specials_mobile($cat, $list) {

      if($cat == 1) { // Real estate category specials
        $data = array(
          'spre_type' => $this->input->post('type'),
          'spre_rentsale' => $this->input->post('rentsale'),
          'spre_list' => $list,
        );
        $this->db->insert('sp_real_estate', $data);
      }

      if($cat == 2) { // Jobs category specials
        $data = array(
          'spjo_company' => $this->input->post('company'),
          'spjo_job_title' => $this->input->post('job_title'),
          'spjo_qualification' => $this->input->post('qualification'),
          'spjo_deadline' => $this->input->post('deadline'),
          'spjo_list' => $list,
        );
        $this->db->insert('sp_jobs', $data);
      }

      if($cat == 5) { // Automobile category specials
        $data = array(
          'spau_make' => $this->input->post('make'),
          'spau_model' => $this->input->post('model'),
          'spau_mileage' => $this->input->post('mileage'),
          'spau_body' => $this->input->post('body'),
          'spau_color' => $this->input->post('color'),
          'spau_list' => $list,
        );
        $this->db->insert('sp_automobile', $data);
      }

      if($cat == 6) { // Events category specials
        $data = array(
          'spev_company' => $this->input->post('company'),
          'spev_startdate' => $this->input->post('startdate'),
          'spev_starttime' => $this->input->post('starttime'),
          'spev_list' => $list,
        );
        $this->db->insert('sp_events', $data);
      }

    }




}
