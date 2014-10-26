<?php

class Config_model extends CI_Model{

	function getActiveYears() {
		$this->db->select('value');
		$this->db->from('config');
		$this->db->where('type','active_year');
		$this->db->order_by('value','desc');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row->value;
			}
			return $data;
		}
	}

	function saveActiveYears($data) {
		$this->db->where('type','active_year');
		$this->db->delete('config');
		$this->db->insert_batch('config', $data);
	}
}