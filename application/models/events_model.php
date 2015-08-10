<?php

class Events_model extends CI_Model{

    function getAllEvents(){
        $this->db->select('*');
        $this->db->from('events');
        $this->db->order_by('date','asc');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
    }

    function getEventsByAcademicYear($year){
        $startdate    = "{$year}-09-01";
        $year++;
        $enddate    = "{$year}-08-31";
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where("date >=  '".$startdate."' AND date <= '".$enddate."'");
        $this->db->order_by("date", "desc");
        $query = $this->db->get();

        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
            return $data;
        }
    }

    function getEvent($id) {

        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            return $query->row();
        }
    }

    function add_event($data) {

        $this->db->insert('events', $data);
        return;
    }

    function update_event($id, $data) {

        $this->db->where('id', $id);
        $this->db->update('events',$data);
    }

    function delete_event($id) {

        // if there are registrations for this event, return false.
        $this->db->select('count(*) amount');
        $this->db->from('registrations');
        $this->db->where('event_id', $id);
        $query = $this->db->get();
        if($query->row()->amount != 0) {
            return false;
        } else {
            $this->db->where('id', $id);
            return $this->db->delete('events');
        }
    }
}
