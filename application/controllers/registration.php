<?php
class Registration extends MY_Controller {

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
		$data['title'] = "Registration - select event";
		$this->template->load('default', 'registration_select_event', $data);
	}
	
	public function event($eventId) {
		$this->session->set_userdata('eventId',$eventId);
		$this->load->model('students_model');
		$this->load->model('events_model');
		$this->load->model('registration_model');
		$this->load->model('config_model');
		$active_years = $this->config_model->getActiveYears();
		$data['ay_titles'] = array();
		$data['records'] = array();
		foreach($active_years as $ay) {
			array_push($data['records'], $this->students_model->getStudentsByAcademicYear($ay));
			array_push($data['ay_titles'], 'Academic Year '.strval($ay.'-'.(intval($ay)+1)));
		}
		$data['recordsESNers'] = $this->students_model->getAllESNers();
		$data['event'] = $this->events_model->getEvent($eventId);
		$data['registrations'] = $this->registration_model->get_num_registrations($eventId);

		$data['title'] = 'Registration - select student';
		$data['js'] = array('twitter-bootstrap-hover-dropdown.min', 'jquery.quicksearch');
		$this->template->load('default', 'registration_search_student', $data);
	}
	
	public function student($studentId) {
		$this->load->model('students_model');
		$student_data = $this->students_model->getStudent($studentId);
		$this->load->model('events_model');
		$event_data = $this->events_model->getEvent($this->session->userdata('eventId'));
		$data['records'] = array(
			"student_data"	=> $student_data, 
			"event_data"	=> $event_data
			);
		$data['title'] = 'Registration';
		$data['js'] = array('jquery.validate.min');
		$this->template->load('default', 'registration', $data);
	}
	
	public function register($studentId) {
		$this->load->model('registration_model');
		if(!$this->registration_model->get_registration($this->session->userdata('eventId'),$studentId)) {
			$data = array(
				'student_id' => $studentId,
				'event_id' => $this->session->userdata('eventId'),
				'paid' => $this->input->post('paid'),
				'notes' => $this->input->post('notes')
				);
			if($this->registration_model->insert_registration($data)){
				$result = 'true';
			}
		}
		else {
			$result = 'false';
		}
		redirect('registration/event/'.$this->session->userdata('eventId').'?success='.$result);
	}
	
	function checkRegistration($student_id,$event_id) {
		
	}
	
	public function delete($event_id,$student_id) {
		$this->load->model('registration_model');
		if($this->registration_model->delete_registration($event_id,$student_id)) {
			$result = 'true';
		} else {
			$result = 'false';
		}
		redirect('event/registrations/'.$event_id.'?deleted='.$result);
	}
	
	function home($event_id,$message){
		$data = array();
		$this->load->model('registration_model');
		if( $query = $this->registration_model->get_registrations($event_id)) {
			$data['records'] = $query;
		}
		$data['deleted'] = $message;
		$data['eventId'] = $event_id;
		$this->load->view('event_registrations',$data);
	}
	
	public function printList($event_id) {
		$this->load->model('events_model');
		$event = $this->events_model->getEvent($event_id);
		$this->load->library('fpdf');
		$this->fpdf->fpdf('P','mm','A4');
		$this->fpdf->AddFont('AndaleMono','','AndaleMono.php');
		$this->fpdf->AddPage();
		$this->fpdf->SetFont('AndaleMono','',14);
		$this->fpdf->Cell(0,10,iconv('UTF-8', 'ISO-8859-7', $event->name),0,1);
		$this->fpdf->Cell(0,10,'',0,1);
		$this->load->model('registration_model');
		$registrations = $this->registration_model->get_registrations($event_id);
		foreach($registrations as $registration) {
			$this->fpdf->SetFont('helvetica','',12);
			//$this->fpdf->SetFont('AndaleMono','',12);
			$this->fpdf->SetTextColor(0,0,0);
			$x = $this->fpdf->GetX();
		    $y = $this->fpdf->GetY();
			$y+=2;
			if($y>265){
				$this->fpdf->AddPage();
			    $y = $this->fpdf->GetY()+2;
			}
			$this->fpdf->Rect($x,$y,6,6,'D');
			$this->fpdf->SetX(20);
			if($registration->notes) {
				$this->fpdf->SetTextColor(255,0,0);
			}
			if($registration->type == 'esn') {
				$this->fpdf->SetFont('AndaleMono','',12);
				$output_string_name = iconv('UTF-8', 'ISO-8859-7', $registration->name);
				$output_string_surname = iconv('UTF-8', 'ISO-8859-7', $registration->surname);
			} else {
				$output_string_name = utf8_decode($this->clear_special_chars($registration->name));
				$output_string_surname = utf8_decode($this->clear_special_chars($registration->surname));
			}
			$this->fpdf->Cell(0,10,$output_string_name." ".$output_string_surname,0,0);

			$this->fpdf->SetX(90);
			$this->fpdf->Cell(0,10,$registration->phone,0,0);
			$this->fpdf->SetX(130);
			$this->fpdf->Cell(0,10,$registration->email,0,1);
			if($registration->notes) {
				$this->fpdf->SetFont('AndaleMono','',12);
				$this->fpdf->Cell(0,10,iconv('UTF-8', 'ISO-8859-7', "^ "."{$registration->notes}"),0,1);
			}
		}
		$this->fpdf->Output($event->name.'.pdf', 'D');
	}
	
	public function details($event_id,$student_id) {
		$this->load->model('registration_model');
		$this->load->model('events_model');
		$this->load->model('students_model');
		$data['registration'] = $this->registration_model->get_registration($event_id,$student_id);
		$data['student_data'] = $this->students_model->getStudent($student_id);
		$data['event_data'] = $this->events_model->getEvent($event_id);
		$data['title'] = "Registration details";
		$this->template->load('default', 'registration_details', $data);
	}
	
	public function update($event_id,$student_id) {
		$this->load->model('registration_model');
		if(!isset($_POST['submit'])) {
			$data['registration'] = $this->registration_model->get_registration($event_id,$student_id);
			$data['title'] = "Edit registration";
			$data['js'] = array('jquery.validate.min');
			$this->template->load('default', 'registration_update', $data);
		}
		else {
			$data = array(
				'paid' => $this->input->post('paid'),
				'notes' => $this->input->post('notes')
				);
			$this->registration_model->update_registration($event_id,$student_id,$data);
			redirect("registration/details/$event_id/$student_id");
		}
	}

	function clear_special_chars($word) {
		$output = str_replace('ń','n', $word);
		$output = str_replace('ū','u', $output);
		$output = str_replace('š','s', $output);
		$output = str_replace('Ą','A', $output);
		$output = str_replace('ą','a', $output);
		$output = str_replace('Ć','C', $output);
		$output = str_replace('ć','c', $output);
		$output = str_replace('Ę','E', $output);
		$output = str_replace('ę','e', $output);
		$output = str_replace('Ł','L', $output);
		$output = str_replace('ł','l', $output);
		$output = str_replace('Ń','N', $output);
		$output = str_replace('Ó','O', $output);
		$output = str_replace('ó','o', $output);
		$output = str_replace('Ś','S', $output);
		$output = str_replace('ś','s', $output);
		$output = str_replace('Ź','Z', $output);
		$output = str_replace('ź','z', $output);
		$output = str_replace('Ż','Z', $output);
		$output = str_replace('ż','z', $output);
		$output = str_replace('ļ','l', $output);
		$output = str_replace('Ļ','L', $output);
		$output = str_replace('Ş','S', $output);
		$output = str_replace('ş','s', $output);
		return $output;
	}
}