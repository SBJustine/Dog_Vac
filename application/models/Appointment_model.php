<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment_model extends CI_Model {

    // public function insert_appointment($data) {
    //     // Insert data into appointments table
    //     $this->db->insert('appointments', $data);
    // }
    function insert_dataappointment($data)
    {
        $this->db->insert('appointments', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>
