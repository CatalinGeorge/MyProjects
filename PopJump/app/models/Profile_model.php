<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();

    }



    public function get_networks($user)
    {
      $this->db->from('networks');
      $this->db->where('net_us', $user);
      //$this->db->join('icons', 'icons.name =networks.net_name');
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
      $this->db->where('us_id', $user);
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result;
        }else{
            return false;
        }
    }


    public function delete_network($id)
      {
        $this->db->delete('networks',array('net_id' => $id));
      }


  public function change_password($user) {

              $this->db->from('users');
              $this->db->where('us_id', $user);
              $this->db->limit(1);
              $query = $this->db->get();
                if($query->num_rows() > 0){
                    $result = $query->row_array();
                    if($result['us_password'] === md5($this->input->post('oldpass'))) {
                    $data=array(
                      'us_password' =>md5($this->input->post('newpass')),
                    );
                  return $this->db->update('users', $data, array('us_id' => $user));
                } else{ echo 'Password dosen.t match! ';
                }
                }
            }


    public function delete_account($user)
          {
            $this->db->from('users');
            $this->db->where('us_id', $user);
            $this->db->limit(1);
            $query = $this->db->get();
              if($query->num_rows() > 0){
                  $result = $query->row_array();
                  if($result['us_password'] === md5($this->input->post('deletepass'))) {
                    $this->db->delete('users',array('us_id' => $user));
                    $this->db->delete('networks',array('net_us' => $user));
              } else{ echo 'Wrong password!';
              }
            }
          }









}
