<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');

    }

public function submit_ticket($path, $file, $user)
          {
            $data=array(
              'tic_title' =>$this->input->post('title'),
              'tic_priority' =>$this->input->post('type'),
              'tic_description' =>$this->input->post('description'),
              'tic_media_folder' =>$path,
              'tic_media_attach' =>$file,
              'tic_data' =>date('y-m-d'),
              'tic_user' => $user,
            );
            return $this->db->insert('tickets',$data);
          }





}
