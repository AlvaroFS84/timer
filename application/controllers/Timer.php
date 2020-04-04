<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timer extends CI_Controller {

    
	public function start(){
        $name = htmlspecialchars($this->input->post('name'));
        $this->load->model('Task_model');
        $this->Task_model->start(htmlspecialchars($name));
    }
    public function stop(){
        $name = $this->input->post('name');
        $time = $this->input->post('time');
        $this->load->model('Task_model');
        $this->Task_model->stop(htmlspecialchars($name),htmlspecialchars($time));
    }

}
