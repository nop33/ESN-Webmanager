<?php
class My404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in') != true) { //if the user is not logged in
            redirect('login');
        }
    }

    public function index() {
        $this->output->set_status_header('404');
        $data = array('title' => '404 :(');
        $this->template->load('default', 'error_404', $data);
    }
}
