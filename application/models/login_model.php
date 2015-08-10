<?php

class Login_model extends CI_Model {

    function validate($username,$password) {
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $query = $this->db->get('users');

        if($query->num_rows == 1) {
            return $query->row();
        }
        return false;
    }
}
