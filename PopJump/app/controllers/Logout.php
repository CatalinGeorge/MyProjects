<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('main_model');
        $this->load->helper('form');
        $this->load->helper('url');

    }

    public function index()
    {
        $this->session->unset_userdata('user');
        redirect('main');
    }

}
