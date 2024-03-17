<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function updateAttendance($employeeID,$status) {
        // incerment the days present or absent
        
        if ($status === "present") {
            $this->db->set('numOfDaysPresent', 'numOfDaysPresent + 1', FALSE);
        } else {
            $this->db->set('numOfDaysAbsent', 'numOfDaysAbsent + 1', FALSE);
        }
        $this->db->where('employeeID', $employeeID);
        return $this->db->update('attendance_table'); // Update existing record
    }

    public function updateTimeUpdated($employeeID){
        $data = array(
            'employeeLastTimeUpdated' => date('Y-m-d')
        );
        
        $this->db->where('employeeID', $employeeID);
        $this->db->update('employee_table', $data);
    }

    public function addAttendance($data) {
        // Update the attendance for the specified employee with the provided status
        $data = array(
            'status' => $status
        );
        $this->db->where('employeeID', $employeeID);
        return $this->db->update('attendance_table', $data); // Update existing record
    }


    function fetch_allattendance($id){

        $query = $this->db->query("SELECT * FROM `employee_table`   " );
        return $query->result();

    }

    function fetch_allattendance_date($date){

        $query = $this->db->query("SELECT * FROM `employee_table`  WHERE  `employeeLastTimeUpdated` !='". $date ."'");
        return $query->result();

    }

    function fetch_allattendance_table($id){

        $query = $this->db->query("SELECT * FROM `attendance_table`   " );
        return $query->result();

    }
}
?>
