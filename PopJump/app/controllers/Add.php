<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Add extends CI_Controller {

	public function __construct()
			 {

							 parent::__construct();
							// include_once APPPATH."libraries/twitter-oauth-php/twitteroauth.php";
							 $this->load->model('add_model');
							 $this->load->helper('url_helper');
							 $this->load->library('session');
							 $this->load->helper('form');
							 $this->load->helper('directory');
							 $this->load->library('form_validation');
			 }


  public function index()
  {
		if($this->session->user) {
      $data['user'] = $this->session->user;
		}else {
			  $data['user'] = null;
				redirect('home');
		}
		$data['networks'] = $this->add_model->get_networks();
		$this->load->view('includes/header', $data);
		$this->load->view('add_view', $data);
		$this->load->view('includes/footer');
}

 public function add_details()
 {
	 $data['user'] = $this->session->user;
	 $data['other'] = $this->input->post('other');
	 $this->session->social = $data['other'];
	 $other = $this->session->social;
	 echo $other;
   $this->load->view('includes/header', $data);
   $this->load->view('details_view', $data);
   $this->load->view('includes/footer');
 }

  public function add_new_profile()
	{


				$user = $this->session->user['us_id'];
				$this->add_model->save_profile($user);
				redirect('profile');



	}

	public function save_network()
    {
				$this->form_validation->set_rules('url', 'url', 'required|is_unique[networks.net_url]');

				if ($this->form_validation->run() === FALSE)
					{
						echo 'baaa';
					}
					else
					{
						$user = $this->session->user['us_id'];
		       // $other = $this->session->social;
		        $this->add_model->save_network($user);
		        redirect('add');
					}
    }

		public function getNetworksMobile() {
			$networks = $this->add_model->get_networks();
			echo json_encode($networks);
		}


}
