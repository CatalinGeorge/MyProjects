<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }

    // Read data using username and password
  public function login_admin() {

      $data = array(
        'email' => strip_tags($this->input->post('email')),
        'pass' => $this->input->post('pass'),
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

    public function get_users_pop($id)
        {
          $this->db->from('users');
          $this->db->where('us_id',$id);
        //  $this->db->join('providers','providers.pr_id =products.prd_user');
          $query = $this->db->get();
                if($query->num_rows()>0)
                {
                  $result = $query->row_array();
                  return $result;
                }
                else return false;
        }

    public function get_users()
    {
      $this->db->from('users');
      //$this->db->join('products','products.prd_user =providers.pr_id');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
      }
    }

    public function get_single_user($id)
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

    public function delete_user($id)
          {
            $this->db->delete('networks',array('net_us' => $id));
            $this->db->delete('users',array('us_id' => $id));
          }

   public function user_networks($id)
   {
     $this->db->from('networks');
     $this->db->where('net_us', $id);
     $query = $this->db->get();
       if($query->num_rows() > 0){
           $result = $query->result_array();
           return $result;
       }else{
           return false;
     }
   }

   public function edit_user($id)
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

    public function get_platforms()
     {
       $this->db->from('icons');
       $query = $this->db->get();
         if($query->num_rows() > 0){
             $result = $query->result_array();
             return $result;
         }else{
             return false;
         }
     }

    public function save_edituser()
        {
          $data = array(
            'us_first' => $this->input->post('us_first'),
            'us_last' => $this->input->post('us_last'),
            'us_email' => $this->input->post('us_email'),
            'us_description' => $this->input->post('us_description'),
        );
        return $this->db->update('users', $data, array('us_id' => $this->input->post('us_id')));
        }

        public function save_set_order($user,$order)
            {
              $data = array(
                'us_set_order' => $order,

            );
            return $this->db->update('users', $data, array('us_id' => $user));
            }

        public function delete_network($id)
              {
                $this->db->delete('networks',array('net_id' => $id));
              }

        public function edit_network($id)
         {
           $this->db->from('networks');
           $this->db->where('net_id', $id);
           $query = $this->db->get();
             if($query->num_rows() > 0){
                 $result = $query->row_array();
                 return $result;
             }else{
                 return false;
             }
         }

         public function save_editnetwork()
             {
               $data = array(
                 'net_name' => $this->input->post('net_name'),
                 'net_url' => $this->input->post('net_url'),
             );
             return $this->db->update('networks', $data, array('net_id' => $this->input->post('net_id')));
             }

      public function add_platform()
           {
             $data = array(
               'name' => $this->input->post('name'),
               'slug' => $this->input->post('slug'),
               'icon' => $this->input->post('icon'),
           );
            $this->db->insert('icons',$data);
           }

    public function set_popularity($id,$pop)
    {
      $data = array(
                    'us_set_pop' => $pop+1 ,
                    );
                        $this->db->where('us_id', $id);
                        $this->db->update('users', $data);

    }

    public function unset_popularity($id,$pop)
    {
      $data = array(
                    'us_set_pop' => $pop-1 ,
                    );
                        $this->db->where('us_id', $id);
                        $this->db->update('users', $data);
    }

    public function block($id,$pop)
    {
      $data = array(
                    'us_set_block' => $pop+1 ,
                    );
                        $this->db->where('us_id', $id);
                        $this->db->update('users', $data);
    }

    public function unblock($id,$pop)
    {
      $data = array(
                    'us_set_block' => $pop-1 ,
                    );
                        $this->db->where('us_id', $id);
                        $this->db->update('users', $data);
    }


    public function add_network()
    {

                  $data=array(
                    'net_url' =>$this->input->post('url'),
                    'net_name_user' =>$this->input->post('uname'),
                    'net_name' =>$this->input->post('nname'),
                    'net_social_id' =>$this->input->post('id'),
                    'net_avatar' =>$this->input->post('avatar'),
                    'net_verified' =>$this->input->post('verified'),
                    'net_us' =>$this->input->post('net_us'),
                  );
                   $this->db->insert('networks',$data);


    }

    public function search_users()
        {
          $s_query = $this->input->post('search_query');

          // break search phrase into keywords
          $keywords = explode(' ', $s_query);

          // Build query
          foreach ($keywords as $keyword)
          {
              $this->db->or_where("`us_first` LIKE '%$keyword%'");
              $this->db->or_where("`us_last` LIKE '%$keyword%'");
          }
          $query = $this->db->get('users');
          return $query->result_array();

        }

  public function delete_platform($id)
          {
            $this->db->delete('icons',array('id' => $id));
          }

}
