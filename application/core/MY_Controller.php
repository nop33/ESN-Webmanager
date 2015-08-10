<?php
    class MY_Controller extends CI_Controller {
        function __construct() {
            parent::__construct();

            if (!$this->session->userdata('logged_in')) {
                redirect('login');
            }
            $data['is_admin'] = $this->session->userdata('is_admin');
        }
    }
?>
