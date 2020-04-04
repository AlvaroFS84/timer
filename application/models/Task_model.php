<?php
    class Task_model extends CI_Model {
       
        function start($name) {
            $id = $this->get_id_by_name($name);
            if($id){
                $this->create_task($id);
            }else{
                //insert task
                $this->db->set('name', $name);
                $this->db->insert('tasks');

                //insert data
                $id = $this->get_id_by_name($name);
                $this->create_task($id);
            } 
        }

        function stop($name,$time){
            $id = $this->get_id_by_name($name);

            $this->db->set('status', 0);
            $this->db->set('end_time', date("Y-m-d H:i:s"));
            $this->db->set('elapsed_time', $time);
            $this->db->where('id_task', $id);
            $this->db->where('status', 1);
            $this->db->update('times');
        }

        function getAllTasks(){
            $query = $this->db->get('tasks');
            $this->db->select('name,elapsed_time');
            $this->db->from('tasks');
            $this->db->join('times', 'tasks.id = times.id_task');
            $this->db->group_by('tasks.id');
            $this->db->select_sum('elapsed_time');
            $query = $this->db->get();

            return json_encode($query->result());
        }
        public function todays_task_time(){
            //$query = $this->db->select('SELECT SUM(elapsed_time) as today_time FROM times WHERE DATE(start_time) = CURDATE() AND DATE(end_time) = CURDATE()');
            //$todays_tasks_time = $query->result; 
            $this->db->select('SUM(elapsed_time) as today_time');
            $this->db->from('times');
            $this->db->where('DATE(start_time)', date("Y/m/d"));
            $this->db->where('DATE(end_time) ', date("Y/m/d"));
            $query = $this->db->get();

            $today_time = $query->row_array()['today_time'];

            //get get only today time on tasks which started  on another day and ended today

            $this->db->select('SUM(end_time - (SELECT timestamp(current_date))) as only_today_time');
            $this->db->from('times');
            $this->db->where('DATE(start_time) !=', date("Y/m/d"));
            $this->db->where('DATE(end_time) ', date("Y/m/d"));
            $query = $this->db->get();

            echo $today_time + $query->row_array()['only_today_time'];
        }

        private function get_id_by_name($name){
            $this->db->select('id');
            $this->db->where('name', $name);
            $query = $this->db->get('tasks');

            return $query->row_array()['id'];
        }
        private function create_task($id){
            $this->db->set('id_task', $id);
            $this->db->set('status', 1);
            $this->db->set('start_time', date("Y-m-d H:i:s"));
            $this->db->insert('times');
        }

        
    }

