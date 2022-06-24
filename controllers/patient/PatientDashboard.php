
<?php
	class PatientDashboard extends MY_Controller{
		public function __construct(){
			parent:: __construct();
			if(!$this->session->userdata('loggedin')){
				redirect("login");
			}
			else{
				$this->get_usersession();
				//$this->load->model('Dashboard_model'); 
			}
		}	
	    public function index(){	      									
			$this->session->set_userdata('');
			$session_data = $this->session->userdata('id');
			$this->Administrator_model->get_login($session_data);
			$users = $this->Administrator_model->get_login($session_data);			
			$data['users']=$this->Administrator_model->get_login($session_data);
			$data['totalPatient']=$this->Patient_model->getPatientTotal();
			$data['genders']=$this->Patient_model->getPatientGender();
			$data['main_content'] = 'patient/dashboard/dashboardMainUI';
			$this->load->view('patient/layouts/main',$data);	        
	    }
	}
?>