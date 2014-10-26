<?php
class Event extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('logged_in') != true) { //if the user is not logged in
			redirect('login');
		}
	}
	
	public function index() {
		$this->load->model('events_model');
		$this->load->model('config_model');
		$active_years = $this->config_model->getActiveYears();
		$data['ay_titles'] = array();
		$data['records'] = array();
		foreach($active_years as $ay) {
			array_push($data['records'], $this->events_model->getEventsByAcademicYear($ay));
			array_push($data['ay_titles'], 'Academic Year '.strval($ay.'-'.(intval($ay)+1)));
		}
		$data['title'] = "Events";
		$this->template->load('default', 'events', $data);
	}
	
	public function details() {
		$id = $this->uri->segment(3);
		$this->load->model('events_model');
		$data['event'] = $this->events_model->getEvent($id);
		$data['title'] = $data['event']->name;
		$this->template->load('default', 'event_details', $data);
	}
	
	public function create() {
		if(!isset($_POST['submit'])) {
			$data['title'] = 'Create event';
			$data['css'] = array('datepicker', 'default.time', 'default');
			$data['js'] = array('bootstrap-datepicker', 'jquery.validate.min', 'picker', 'picker.time');
			$this->template->load('default', 'event_create', $data);
		}
		else {
			$this->event_create();
		}
	}
	
	private function event_create() {
		$data = array(
			'name' 		   => $this->input->post('name'),
			'date' 		   => $this->input->post('date'),
			'fee_with' 	   => $this->input->post('feewith'),
			'fee_without'  => $this->input->post('feewithout'),
			'maxNumPeople' => $this->input->post('maxNumPeople'),
			'notes' 	   => $this->input->post('notes'),
			'type'		   => $this->input->post('type'),
			'starttime'	   => $this->input->post('starttime'),
			'endtime'	   => $this->input->post('endtime'),
			'place'	       => $this->input->post('place')
		);
		$this->load->model('events_model');
		$this->events_model->add_event($data);
		redirect('event');
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		$this->load->model('events_model');
		if(!isset($_POST['submit'])) {
			$data['event'] = $this->events_model->getEvent($id);
			$data['title'] = 'Edit event';
			$data['css'] = array('datepicker');
			$data['js'] = array('bootstrap-datepicker', 'jquery.validate.min');
			$this->template->load('default', 'event_update', $data);
		}
		else {
			$data = array(
				'name' => $this->input->post('name'),
				'date' => $this->input->post('date'),
				'fee_with' => $this->input->post('feewith'),
				'fee_without' => $this->input->post('feewithout'),
				'maxNumPeople' => $this->input->post('maxNumPeople'),
				'notes' => $this->input->post('notes')
			);
			$this->events_model->update_event($id,$data);
			redirect('event');
		}
	}

	public function delete() {
		$id = $this->uri->segment(3);
		$this->load->model('events_model');
		if($this->events_model->delete_event($id)) {
			$result = 'true';
		} else {
			$result = 'false';
		}
		redirect('event?deleted='.$result);
	}
	
	function home($message){
		$data = array();
		$this->load->model('events_model');
		if( $query = $this->events_model->getAllEvents()) {
			$data['records'] = $query;
		}
		$data['deleted'] = $message;
		$this->load->view('events',$data);
	}
	
	public function registrations($event_id) {
		$this->load->model('registration_model');
		$this->load->model('events_model');
		$data['eventId'] = $event_id;
		$data['event'] = $this->events_model->getEvent($event_id);
		$data['records'] = $this->registration_model->get_registrations($event_id);
		$data['title'] = "{$data['event']->name} registrations";
		$this->template->load('default', 'event_registrations', $data);
	}
}