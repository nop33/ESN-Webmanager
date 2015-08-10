<?php
class Student extends MY_Controller {

	public function index() {
		$this->load->model('students_model');
		$this->load->model('config_model');
		$active_years = $this->config_model->getActiveYears();
		$data['ay_titles'] = array();
		$data['records'] = array();
		foreach($active_years as $ay) {
			array_push($data['records'], $this->students_model->getStudentsByAcademicYear($ay));
			array_push($data['ay_titles'], 'Academic Year '.strval($ay.'-'.(intval($ay)+1)));
		}
		$data['recordsESNers'] = $this->students_model->getAllESNers();
		$data['title'] = 'Students';
		$data['js'] = array('jquery.quicksearch');
		$this->template->load('default', 'students', $data);
	}
	
	public function details() {
		$id = $this->uri->segment(3);
		$this->load->model('students_model');
		$data['student'] = $this->students_model->getStudent($id);
		$data['title'] = "Student details";
		$this->template->load('default', 'student_details', $data);
	}
	
	public function create() {
		if(!isset($_POST['submit'])) {
			$data['title'] = 'Create student';
			$data['js'] = array('jquery.validate.min');
			$this->template->load('default', 'student_create', $data);
		}
		else {
			$this->student_create();
		}
	}
	
	private function student_create() {
		$data = array(
			'name' 		=> $this->input->post('name'),
			'surname' 	=> $this->input->post('surname'),
			'email' 	=> $this->input->post('email'),
			'phone' 	=> $this->input->post('phone'),
			'esncard' 	=> $this->input->post('esnCard'),
			'has_esncard'=>$this->input->post('has_esncard'),
			'section' 	=> $this->input->post('section'),
			'type' 		=> $this->input->post('type'),
			'semester'	=> $this->input->post('semester')
		);
		
		$this->load->model('students_model');
		if($this->students_model->add_student($data)) {
			$result = 'true';
		} else {
			$result = 'false';
		}
		
		redirect('student'.'?success='.$result);
	}
	
	public function update() {
		$id = $this->uri->segment(3);
		$this->load->model('students_model');
		if(!isset($_POST['submit'])) {
			$data['student'] = $this->students_model->getStudent($id);
			$data['title'] = 'Edit student';
			$data['js'] = array('jquery.validate.min');
			$this->template->load('default', 'student_update', $data);
		}
		else {
			if($_POST['country'] != '') {
				$data = array(
					'name' 		=> $this->input->post('name'),
					'surname' 	=> $this->input->post('surname'),
					'country' 	=> $this->input->post('country'),
					'email' 	=> $this->input->post('email'),
					'phone' 	=> $this->input->post('phone'),
					'esncard' 	=> $this->input->post('esnCard'),
					'has_esncard'=>$this->input->post('has_esncard'),
					'section' 	=> $this->input->post('section'),
					'type' 		=> $this->input->post('type'),
					'semester'	=> $this->input->post('semester')
					);
			}
			else {
				$data = array(
					'name' 		=> $this->input->post('name'),
					'surname' 	=> $this->input->post('surname'),
					'email' 	=> $this->input->post('email'),
					'phone' 	=> $this->input->post('phone'),
					'esncard' 	=> $this->input->post('esnCard'),
					'has_esncard'=>$this->input->post('has_esncard'),
					'section' 	=> $this->input->post('section'),
					'type' 		=> $this->input->post('type'),
					'semester'	=> $this->input->post('semester')
					);
			}
			$this->students_model->update_student($id,$data);
			redirect('student');
		}
	}

	public function delete() {
		$id = $this->uri->segment(3);
		$this->load->model('students_model');
		if($this->students_model->delete_student($id)) {
			$result = 'true';
		} else {
			$result = 'false';
		}
		redirect('student?deleted='.$result);
	}
	
	function home($message){
		$data = array();
		$this->load->model('students_model');
		if( $query = $this->students_model->getAllStudents()) {
			$data['records'] = $query;
		}
		$data['deleted'] = $message;
		$data['title'] = 'Students';
		$data['js'] = array('jquery.quicksearch');
		$this->template->load('default', 'students', $data);
	}
	
	public function updateCard($student_id) {
		$this->load->model('students_model');
		$data = array('has_esncard' => 1);
		$this->students_model->update_student($student_id,$data);
		redirect("registration/student/$student_id");
	}
}