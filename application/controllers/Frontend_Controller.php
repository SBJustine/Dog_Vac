<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Users_model');
		$this->load->model('Appointment_model');
		$this->load->library('session');

	}

	public function index()
	{
		if (isset($_POST['login_btn_client'])) {
			$email= $this->input->post('user_email');
			$pw= $this->input->post('user_password');

			$user_data=$this->Users_model->authenticateclient($email);

			if (!empty($user_data)== TRUE) {
				if ($user_data[0]->password == $pw) {
					$userdata = array(
										'user_id' 			=> $user_data[0]->id,
										'fullname' 			=> $user_data[0]->fullname,

									);
					$this->session->set_userdata($userdata);
					redirect('welcomeAcc');
				}else {
					$this->session->set_flashdata('msg_login','Invalid Password. Please try again.');
				}

			}else {
				$this->session->set_flashdata('msg_login','Account not found. Please try again.');
				// code...
			}
		}
		$this->load->view('frontend/page/login_client');
	}

	public function home()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/home',$data);
		$this->load->view('frontend/include/footer',$data);
	}

	public function home1()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/home1',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function about()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/about',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function about1()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/about1',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function services()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/services',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function services1()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/services1',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function contact()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header',$data);
		$this->load->view('frontend/page/contact',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	public function contact1()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/contact1',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	// public function appointment()
	// {
	// 	$data['website_info'] = $this->Users_model->fetch_all("website_info");
	// 	$this->load->view('frontend/include/headerClient',$data);
	// 	$this->load->view('frontend/page/appointment',$data);
	// 	// $this->load->view('frontend/include/footer',$data);
	// }

	public function create_appointment()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/create_appointment',$data);
		$this->load->view('frontend/include/footer',$data);
	}

	public function appointment_form() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('appointmentName', 'NameofOwner', 'required');
		$this->form_validation->set_rules('appointmentPetName', 'NameofPet', 'required');
		$this->form_validation->set_rules('vaccine', 'TypeofVaccine', 'required');
		$this->form_validation->set_rules('appointmentDateTime', 'DateandTime', 'required');
		$this->form_validation->set_rules('appointmentContactNumber', 'ContactNumber', 'required');
		
		if (!$this->session->has_userdata('user_id')) {
			redirect('home'); // Redirect to login page if not logged in
		}
		
		$user_id = $this->session->userdata('user_id');
		if ($this->form_validation->run() !== FALSE) {
			// Validation failed, redirect back to the form
			$this->create_appointment();
		} else {
			// Validation succeeded, proceed with data insertion
			$data = array(
				'appointmentName' => $this->input->post('appointmentName'),
				'appointmentClientId' => $user_id,
				'appointmentPetName' => $this->input->post('appointmentPetName'),
				'vaccine' => $this->input->post('vaccine'),
				'appointmentDate' => $this->input->post('appointmentDate'),
				'appointmentContactNumber' => $this->input->post('appointmentContactNumber'),
		
			);
	
			$result = $this->Users_model->insert_dataappointments($data);
	
			if ($result) {
				// Data insertion was successful
				$this->session->set_flashdata('success', 'Data inserted successfully.');
			} else {
				// Data insertion failed
				$this->session->set_flashdata('error', 'Failed to insert data.');
			}
	
	
			// Redirect to a suitable page after the form submission
			redirect('create_appointment');
		}
	}

	// public function create_appointment() {
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('appointmentName', 'Name of owner', 'required');
	// 	$this->form_validation->set_rules('appointmentPetName', 'Name of pet', 'required|valid_email');
	// 	$this->form_validation->set_rules('vaccine', 'Select a service', 'required');
	// 	$this->form_validation->set_rules('appointmentContactNumber', 'Contact Number', 'required');
	// 	$this->form_validation->set_rules('appointmentDate', 'Appointment Date', 'required');
	
	// 	if (!$this->session->has_userdata('user_id')) {
	// 		redirect('create_appoinment'); // Redirect to login page if not logged in
	// 	}
	
	// 	if ($this->form_validation->run() === FALSE) {
	// 		// Validation failed, redirect back to the form
	// 		$this->load->view('frontend/include/header1');
	// 		$this->load->view('frontend/page/create_appointment');
	// 		$this->load->view('frontend/include/footer');
	// 	} else {
	// 		// Validation succeeded, proceed with data insertion
	// 		$data = array(
				
	// 			'appointmentName' => $this->input->post('appointmentName'),
	// 			'appointmentPetName' => $this->input->post('appointmentPetName'),
	// 			'vaccine' => $this->input->post('vaccine'),
	// 			'appointmentContactNumber' => $this->input->post('appointmentContactNumber'),
	// 			'appointmentDate' => $this->input->post('appointmentDate'),
	// 		);
	
	// 		$result = $this->Users_model->insert_dataappointment($data);
	
	// 		if ($result) {
	// 			// Data insertion was successful
	// 			$this->session->set_flashdata('success', 'Data inserted successfully.');
	// 		} else {
	// 			// Data insertion failedhome
	// 			$this->session->set_flashdata('error', 'Failed to insert data.');
	// 		}
	
	// 		// Redirect to a suitable page after the form submission
	// 		redirect('home1');
	// 	}
	
	// }
	
	public function myAccount()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/include/navClient',$data);
		$this->load->view('frontend/page/myAccount',$data);
		// $this->load->view('frontend/include/footer',$data);
	}

	public function welcomeAcc()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/header1',$data);
		$this->load->view('frontend/page/welcomeAcc',$data);
	    $this->load->view('frontend/include/footer',$data);
	}

	public function owner_pet()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/headerClient',$data);
		$this->load->view('frontend/page/owner_pet',$data);
		$this->load->view('frontend/include/footer',$data);
	}

	public function vacSched()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/headerClient',$data);
		$this->load->view('frontend/page/vacSched',$data);
		$this->load->view('frontend/include/footer',$data);
	}
	
	public function prodPurchased()
	{
		$data['website_info'] = $this->Users_model->fetch_all("website_info");
		$this->load->view('frontend/include/headerClient',$data);
		$this->load->view('frontend/page/prodPurchased',$data);
		$this->load->view('frontend/include/footer',$data);
	
	}
}
