<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

    public function get_tickets($type, $user)
    {
      $this->db->from('tickets');
      if($user != false) {
        if($type=='inbox') {
          $this->db->where('tic_trash_user', 0);
        }
        if($type=='trash') {
          $this->db->where('tic_trash_user', 1);
        }
        $this->db->where('tic_user', $user);
      } else {
        if($type=='inbox') {
          $this->db->where('tic_trash_admin', 0);
        }
        if($type=='trash') {
          $this->db->where('tic_trash_admin', 1);
        }
      }
      $this->db->join('users','users.us_id=tickets.tic_user');
      $query = $this->db->get();
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }

    public function count_tickets()
    {
      return $this->db->count_all_results('tickets');
    }

    public function updateStatusTicketUser($status, $id) {

      if($status == 'read') {
        $data = array(
          'tic_opened_user' => 1,
        );
      }

      if($status == 'delete') {
        $data = array(
          'tic_trash_user' => 1,
        );
      }

      return $this->db->update('tickets', $data, array('tic_id' => $id));
    }

    public function updateStatusTicketAdmin($status, $id) {

      if($status == 'read') {
        $data = array(
          'tic_opened_admin' => 1,
        );
      }

      if($status == 'delete') {
        $data = array(
          'tic_trash_admin' => 1,
        );
      }

      return $this->db->update('tickets', $data, array('tic_id' => $id));
    }

    public function createMessage($user, $ticket, $message, $attach) {
      $data = array(
        'me_user' => $user,
        'me_ticket' => $ticket,
        'me_message' => $message,
        'me_attach' => $attach
      );

      $dataUpdate = array(
        'tic_opened_user' => 0,
        'tic_opened_admin' => 0,
      );

      $this->db->update('tickets', $dataUpdate, array('tic_id' => $ticket));

      return $this->db->insert('messages', $data);
    }

    public function get_ticketMessages($ticket)
    {
        $this->db->from('messages');
        $this->db->where('me_ticket', $ticket);
        $this->db->join('users','users.us_id=messages.me_user');
        $query = $this->db->get();
          if($query->num_rows() > 0){
              $result = $query->result_array();
              return $result;
          }else{
              return false;
          }

    }

}
