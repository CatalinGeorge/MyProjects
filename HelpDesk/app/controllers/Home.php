<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Home extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('home_model');
								$this->load->helper('url_helper');
								$this->load->library('session');
								$this->load->helper('form');
							 	$this->load->library('form_validation');
							 	$this->load->helper('url_helper');

        }

				public function index()
				{
					if($this->session->user['us_email'] == 'admin@mail.com') {
						      $data['user'] = $this->session->user;
								}else {
									  $data['user'] = null;
										redirect('account');
						}
					$data['user'] = $this->session->user;
					$user = $this->session->user['us_id'];
					$this->load->view('includes/header', $data);
					$this->load->view('home_view', $data);
					$this->load->view('includes/footer');
				}

				public function user()
				{
					if($this->session->user) {

								}else {
										$data['user'] = null;
										redirect('account');
						}
					$data['user'] = $this->session->user;
					$user = $this->session->user['us_id'];
					$this->load->view('includes/header', $data);
					$this->load->view('user_view', $data);
					$this->load->view('includes/footer');
				}

	public function getTicketsInboxJSON($user = false) {
		$data = $this->home_model->get_tickets('inbox', $user);
		echo json_encode($data);
	}
	public function getTicketsTrashJSON($user = false) {
		$data = $this->home_model->get_tickets('trash', $user);
		echo json_encode($data);
	}

	public function setStatusTicketUser($status, $id) {
		$this->home_model->updateStatusTicketUser($status, $id);
	}

	public function setStatusTicketAdmin($status, $id) {
		$this->home_model->updateStatusTicketAdmin($status, $id);
	}

	public function getTicketMessages($ticket) {
		$data = $this->home_model->get_ticketMessages($ticket);
		echo json_encode($data);
	}

	public function createMessage() {

		$user = $_GET['user'];
		$ticket = $_GET['ticket'];
		$message = $_GET['message'];
		$media = $_GET['media'];
		if(!$_FILES) {
			$attach = 'no-image';
		} else {
			$attach = $_FILES["image"]["name"];
			$target_dir = "./media/".$media."/".$attach;
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
		}
	
		$this->home_model->createMessage($user, $ticket, $message, $attach);

	}


}
