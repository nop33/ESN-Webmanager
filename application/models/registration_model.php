<?php

class Registration_model extends CI_Model{
	
	function insert_registration($data) {
		$success = $this->db->insert('registrations', $data);
		return $success;
	}
	
	function get_registrations($event_id) {
		$this->db->select('*');
		$this->db->from('students');
		$this->db->join('registrations','students.id = registrations.student_id');
		$this->db->where('event_id', $event_id);
		$this->db->order_by('students.name','asc');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function get_registration($event_id,$student_id) {
		$this->db->select('*');
		$this->db->from('registrations');
		$this->db->where('event_id', $event_id);
		$this->db->where('student_id', $student_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
	}
	
	function delete_registration($event_id, $student_id) {
		$this->db->where('student_id', $student_id);
		$this->db->where('event_id', $event_id);
		$result = $this->db->delete('registrations');
		return $result;
	}
	
	function update_registration($event_id, $student_id, $data) {
		$this->db->where('event_id', $event_id);
		$this->db->where('student_id', $student_id);
		$this->db->update('registrations',$data);
	}

	function get_num_registrations($event_id) {
		$this->db->select('count(*) total');
		$this->db->from('students');
		$this->db->join('registrations','students.id = registrations.student_id');
		$this->db->where('event_id', $event_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			return $query->row();
		}
	}
}

?>