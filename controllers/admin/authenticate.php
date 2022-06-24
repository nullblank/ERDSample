<?php
	class Authenticate extends MY_Controller{
		public function __construct(){
			parent:: __construct();
			date_default_timezone_set('Asia/Manila');
			
		}
		public function login(){
			$this->form_validation->set_rules('username','Username','trim|required|min_length[4]');
			$this->form_validation->set_rules('password','Password','trim|required|min_length[4]');			
			if($this->form_validation->run()==FALSE){
				$this->load->view('login');							
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->User_model->setUsername($username);
				$userdetails = $this->User_model->get_user_details();
				$userid = $userdetails->user_id;
				
				$id = $userdetails->user_id;
				$this->load->model('Authenticate_model');
				if($this->Authenticate_model->login_user($username,$password))
				{
					$session_data = array(
						'id' => $id,
						'username' => $username,
						'created' => $created,
						'userid' => $userid,
						'last_login' => date('Y-m-d H:i:s'),
						'loggedin' => true
					);
					$this->session->set_userdata($session_data);
				    $session_data = $this->session->userdata('id');
				   	$this->Authenticate_model->get_login($session_data);
					$users = $this->Authenticate_model->get_login($session_data);
					
					
				   	$this->load->library('session');	
					
					if($users->user_role=='Administrator'){
						redirect('admin/AdminDashboard');				 	
					}
					if($users->user_role=='Management'){
						redirect('analytics/AnalyticsDashboard');				 	
					}					
					if($users->user_role == 'Nurse'){
						redirect('patient/PatientDashboard');				 	
					}
					if($users->user_role== 'MedTech'){
						redirect('covid/CovidDashboard');				 	
					}
					if($users->user_role== 'Doctor'){
						redirect('vaccination/VaccinatonDashboard');				 	
					}
					if($users->user_role== 'Staff'){
						redirect('quarantine/QuarantineDashboard');
					}	
						
				}
				else
				{
					$this->session->set_flashdata('fail_login', 'Invalid Username and Password');
					redirect("login");
				}
			}				
		}
		public function logout(){
			
			$this->session->unset_userdata('loggedin');
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('id');
			$this->session->session_destroy;			
			redirect('login');
		}
		public function logout_guest(){
			
			$this->session->unset_userdata('loggedin');
			$this->session->unset_userdata('userid');
			$this->session->unset_userdata('id');
			$this->session->session_destroy;			
			redirect('login');
		}				
	}
?>