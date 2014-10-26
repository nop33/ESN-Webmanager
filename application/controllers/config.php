<?php
class Config extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in') != true) { //if the user is not logged in
			redirect('login');
		}
	}
	
	public function index() {
		$data = array('title' => 'Configuration');
		$this->load->model('config_model');
		$data['active_years'] = $this->config_model->getActiveYears();
		$this->template->load('default', 'config', $data);
	}

	function save() {
		$this->load->model('config_model');
		if(isset($_POST['active_years'])) {
			$data = array();
			foreach ($_POST['active_years'] as $ay) {
				$row = array(
						'type' => 'active_year',
						'value' => $ay
					);
				array_push($data,$row);
			}
			$this->config_model->saveActiveYears($data);
		}
		redirect('config');
	}

	function getActiveYears() {
		$this->load->model('config_model');
		return $this->config_model->getActiveYears();
	}
}