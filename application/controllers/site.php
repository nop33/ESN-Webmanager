<?php
class Site extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->model('site_model');
		$this->load->model('events_model');
		$this->load->model('registration_model');
		$events = $this->events_model->getAllEvents();
		foreach ($events as $event) {
			$html_popover_content = '';
			if($event->type == 1){
			    $registrations = $this->registration_model->get_num_registrations($event->id);
				if($event->maxNumPeople == 0 && $registrations->total == 0) {
			      $presentage = 0;
				} else if($event->maxNumPeople == 0) {
				  $event->maxNumPeople = $registrations->total;
				  $presentage = round(($registrations->total / $event->maxNumPeople) * 100);
				} else {
				  $presentage = round(($registrations->total / $event->maxNumPeople) * 100);
				}
				$progressbar_type = 'info';
				if($presentage < 80) {
				} else if($presentage < 100) {
				  $progressbar_type = 'warning';
				} else {
				  $progressbar_type = 'danger';
				}
				$html_progress_bar = "<div class='progress' style='width:200px'><div class='progress-bar progress-bar-".$progressbar_type."' role='progressbar' aria-valuenow='".$presentage."' aria-valuemin='0' aria-valuemax='100' style='width: ".$presentage."%'>".$presentage."%<span class='sr-only'>".$presentage."% Complete</span></div></div>";
				$html_popover_content = "<p>".$event->notes."</p><p>Registered: $registrations->total/$event->maxNumPeople</p>".$html_progress_bar;
			} else if($event->type == 2){ 
				$html_popover_content = "<p>".$event->notes."</p><p>From $event->starttime to $event->endtime</p><p>Place: $event->place</p>";
			}
			$date = new DateTime($event->date);
			$event_array[] = array($date->format('d/m/Y'),$event->name,base_url()."event/details/$event->id",'#428bca',$html_popover_content);
		}
		$data['events'] = $event_array;
		$data['title'] = 'Home';
		$data['css'] = array('bic_calendar');
		$data['js'] = array('underscore-min', 'bic_calendar');
		$this->template->load('default', 'home', $data);
	}
	
	public function tutorials() {
		if($this->session->userdata('logged_in') != true) { //if the user is not logged in
			redirect('login');
		}
		$data = array('title' => 'Tutorials');
		$this->template->load('default', 'tutorials', $data);
	}

	public function about() {
		$data = array('title' => 'About');
		$this->template->load('default', 'about', $data);
	}
}