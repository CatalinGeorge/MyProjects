<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->tableName = 'users';
        $this->load->helper('url');

    }


    public function save_profile($user)
              {

                if($this->input->post('nname') == 'Other') {
                    $nname = $this->input->post('nnameo');
                } else {
                    $nname = $this->input->post('nname');
                }

                $data=array(
                  'net_url' =>$this->input->post('url'),
                  'net_name_user' =>$this->input->post('uname'),
                  'net_name' =>$nname,
                //  'net_email' =>$this->input->post('email'),
                //  'net_social_id' =>$this->input->post('id'),
                //  'net_avatar' =>$this->input->post('avatar'),
                  'net_us' =>$user,
                );

                //print_r($data);

                //print_r($data);
                /*$this->db->from('networks');
                $this->db->where('net_us', $user);
              //  $this->db->limit(1);
                $query = $this->db->get();
                  if($query->num_rows() > 0){
                      $result = $query->result_array();
                foreach($result as $res)
                  if($res['net_url'] === $this->input->post('url')){
                redirect('main');
              }*/
                //else{
                $this->db->insert('networks',$data);
              //  }
            //  }
            }


    public function save_network($user) {

                $data=array(
                    'net_name' =>$this->input->post('other'),
                    'net_name_user' =>$this->input->post('soc_name'),
                    'net_url' =>$this->input->post('soc_link'),
                  //  'net_email' =>$this->input->post('soc_email'),
                  //  'net_social_id' =>$this->input->post('soc_id'),
                  //  'net_verified' =>$this->input->post('soc_verified'),
                  //  'net_avatar' =>$this->input->post('soc_avatar'),
                    'net_us' =>$user,
                );

                return $this->db->insert('networks',$data);
            }


    public function get_networks() {
      $this->db->order_by('id', 'ASC');
      $query = $this->db->get('icons');

      return $query->result();
    }







    }
