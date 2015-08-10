<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') == true) { //if the user is logged in
            redirect('site');
        }
    }

    public function index() {
        $config['success'] = true;
        $this->load->view('login', $config);
    }

    public function validate() {
        $this->load->model('login_model');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if(isset($username) && isset($password) && $username!="" && $password!="") {
            $query = $this->login_model->validate($username,$password);
            if($query) { //if the users credentials are validated
                $data = array(
                    'username' => $username,
                    'logged_in' => true,
                    'is_admin' => $query->is_admin
                    );
                $this->session->set_userdata($data);
                redirect('site');
            }
            else {
                $this->invalid();
            }
         }
         else {
             $this->invalid();
         }
    }

    public function invalid() {
        $config['success'] = false;
        $this->load->view('login', $config);
    }

}
