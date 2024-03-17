<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

		function authenticate($email){
			$query = $this->db->query("SELECT * FROM `admin` where email='$email' " );
			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;

		}
		function authenticateclient($email){
			$query = $this->db->query("SELECT * FROM `client_users` where client_email='$email' " );
			if ($query->num_rows() > 0) {
				return $query->result();
			}
				return 0;

		}
		function get_admin_logged_info($id){
			$query = $this->db->query("SELECT *, resident_info.firstname,resident_info.lastname,resident_info.contact_no FROM 'admin_users' inner join resident_info.info' on admin_users.res_id=resident_info.id where admin_users.admin_id='$id'");
			if ($query->num_rows() >0){
				return $query->result();
			} 
			return 0;
	

			
		}

		//Display  Account here

		function fetch_all($id){

			$query = $this->db->query("SELECT * FROM `admin_users`   " );
			return $query->result();

		}

		function fetch_employee_by_name($employeeName) {
			
			$query = $this->db->query("SELECT * FROM `employee_table` WHERE `employeeName` = '". $employeeName."'");
			return $query->result();
		}

		function fetch_employee_by_id($id) {
			
			$query = $this->db->query("SELECT * FROM `employee_table` WHERE `employeeID` = '". $id."'");
			return $query->result();
		}

		

		function fetch_allclient($id){

			$query = $this->db->query("SELECT * FROM `client_users`   " );
			return $query->result();

		}
		function fetch_allpetOwner($id){

			$query = $this->db->query("SELECT * FROM `client_users`   " );
			return $query->result();

		}
		function fetch_allpet($id){

			// ONCE NGA NAA NAY ID SA OWNER ANG PET, PWEDE NA MAGFILTER GAMIT ANG where client-ID = $id

			$query = $this->db->query("SELECT * FROM `pet_users`" );
			return $query->result();

		}
		function fetch_allpurchasedprod_list($id){

			$query = $this->db->query("SELECT * FROM `product_table`   " );
			return $query->result();

		}

		function fetch_allpurchasedlist(){

			$query = $this->db->query("SELECT * FROM `purchase_table`" );
			return $query->result();

		}
		function fetch_allpurchase($id){

			$query = $this->db->query("SELECT * FROM `purchase_table`" );
			return $query->result();

		}
		// function fetch_allpurchaseform($id){

		// 	$query = $this->db->query("SELECT * FROM `purchase_table`" );
		// 	return $query->result();

		// }
		// function fetch_alldashboard($id){

		// 	$query = $this->db->query("SELECT * FROM `purchased_table`   " );
		// 	return $query->result();

		// }

		function fetch_allreports($id){

			$query = $this->db->query("SELECT * FROM `reports`   " );
			return $query->result();

		}
		function fetch_allappointments($id){

			$query = $this->db->query("SELECT * FROM `appointments`   " );
			return $query->result();

		}


		function fetch_allemployee($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}

		function fetch_allproduct($id){

			$query = $this->db->query("SELECT * FROM `product_table`   " );
			return $query->result();

		}


		function fetch_allattendance($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}

		function fetch_allattendance_table($id){

			$query = $this->db->query("SELECT * FROM `employee_table`   " );
			return $query->result();

		}
		
		
		function fetch_allowner_pet($id){

			$query = $this->db->query("SELECT * FROM `pet_table`   " );
			return $query->result();

		}

		// function fetch_allprofile($id){

		// 	$query = $this->db->query("SELECT * FROM `profile`   " );
		// 	return $query->result();

		// }
		public function update_admin($id, $data) {
			$this->db->where('admin_id', $id);
			$this->db->update('admin_users', $data);
			
			return $this->db->affected_rows() > 0;
		}
		
		function get_info($id) {
			$query = $this->db->select('*')
								->from('admin_users')
								->where('admin_id', $id)
								->get();
		
			return $query->result();
		}


		//employee table update

		public function update_employee($id, $data) {  
			$this->db->where('employeeID', $id);
			$this->db->update('employee_table', $data);
			return $this->db->affected_rows() > 0;
		}   
		
		function get_infoemployee($id){
			$query = $this->db->select('*')
							->from('employee_table')
							->where('employeeID', $id)
							->get();
			return $query->row_array();
		}
		

		function fetch_info()
		{
			$query 	= $this->db->query("SELECT * FROM `system_info` " );

			return $query->result();
		}



		//Add Account here

		function insert_data($data)
		{
			$this->db->insert('admin_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}
		function insert_dataappointments($data)
		{
			$this->db->insert('appointments', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_dataclient($data)
		{
			$this->db->insert('client_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		function insert_datapet($data)
		{
			$this->db->insert('pet_users', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_datapurchase($data)
		{
			$this->db->insert('purchase_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_dataemployee($data)
		{
			$this->db->insert('employee_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		//this code below only called when new employee is added
		function insert_pre_employeeAttendance($data)
		{
			$this->db->insert('attendance_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		function insert_dataproduct($data)
		{
			$this->db->insert('product_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}


		function insert_dataattendance_table($data)
		{
			$this->db->insert('attendance_table', $data);
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }
		}

		// public function updateAttendance($employeeID, $status) {
		// 	// Update the attendance table based on the status
		// 	if ($status === 'present') {
		// 		// Increment the number of days present for the employee
		// 		// Perform necessary database update operation
		// 	} elseif ($status === 'absent') {
		// 		// Increment the number of days absent for the employee
		// 		// Perform necessary database update operation
		// 	}
		// }
		

		function set_update($table,$id,$data)
		{

			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('system_info');
			$afftectedRows = $this->db->affected_rows();
	        if ($afftectedRows > 0) {
	            return TRUE;
	        } else {
	            return FALSE;
	        }

		}



}

?>
