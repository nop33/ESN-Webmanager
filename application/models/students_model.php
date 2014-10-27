<?php

class Students_model extends CI_Model{
	
	function getAllStudents(){
		
		$this->db->from('students');
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}

	function getAllESNers() {
		$this->db->from('students');
		$this->db->order_by("name", "asc");
		$this->db->where("type = 'esn'");
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}

	function getStudentsByAcademicYear($year){
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where("semester LIKE '".$year."-%'");
		$this->db->order_by("name", "asc");
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function getStudent($id) {
		
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('id', $id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
	}
	
	function getStudentByESNCardId($esncard) {
		
		$this->db->select('*');
		$this->db->from('students');
		$this->db->where('esncard', $esncard);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
	}
	
	function getStudentsByName($name) {
		$this->db->select('*');
		$this->db->from('students');
		$where = "(name LIKE '%$name%' OR surname LIKE '%$name%')";
		$this->db->where($where);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function add_student($data) {
		$sql = "select id from students where name='".$data['name']."' and surname='".$data['surname']."' and semester='".$data['semester']."'";
		$query = $this->db->query($sql);
		if($query->num_rows() == 0) {
			return $this->db->insert('students', $data);
		} else {
			return false;
		}
	}
	
	function update_student($id, $data) {
		
		$this->db->where('id', $id);
		$this->db->update('students',$data);
	}
	
	function delete_student($id) {
		
		// if there are registrations with this student, return false.
		$this->db->select('count(*) amount');
		$this->db->from('registrations');
		$this->db->where('student_id', $id);
		$query = $this->db->get();
		if($query->row()->amount != 0) {
			return false;
		} else {
			$this->db->where('id', $id);
			return $this->db->delete('students');
		}
	}
}

?>