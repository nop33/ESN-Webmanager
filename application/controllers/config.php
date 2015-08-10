<?php
class Config extends MY_Controller {

    public function index() {
        $data = array('title' => 'Configuration');
        $this->load->model('config_model');
        $data['active_years'] = $this->config_model->getActiveYears();
        $this->template->load('default', 'config', $data);
    }

    function save() {
        $this->load->model('config_model');
        if(isset($_POST['active_years'])) {
            $data = array();
            foreach ($_POST['active_years'] as $ay) {
                $row = array(
                        'type' => 'active_year',
                        'value' => $ay
                    );
                array_push($data,$row);
            }
            $this->config_model->saveActiveYears($data);
        }
        redirect('config');
    }

    function getActiveYears() {
        $this->load->model('config_model');
        return $this->config_model->getActiveYears();
    }
}
