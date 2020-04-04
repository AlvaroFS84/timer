<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    // public function __construct(){
    //     parent::__construct();
    // }

    function get_all(){
        $this->load->model('Task_model');

        echo $this->Task_model->getAllTasks();
    }

    function todays_time(){
        $this->load->model('Task_model');

        echo $this->Task_model->todays_task_time();
    }
	
}
