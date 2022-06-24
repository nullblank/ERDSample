<?php
	class Reports extends MY_Controller{
		public function __construct(){
			parent:: __construct();
			if(!$this->session->userdata('loggedin')){
				redirect("login");
			}
			else{
				$this->get_usersession();
			}
		}
		public function index(){				
			$data['main_content'] = 'patient/reports/manageReportsUI';			
			$this->load->view('patient/layouts/main',$data);
		}
		public function print_report() {			
			$list=$this->input->post('list');				
			if($list == '1'){													
				$data['patient']=$this->Patient_model->getPatientMasterList();									
				$this->load->view('patient/reports/printPatientMasterList',$data);					
			}	
			if($list == '2'){					
				$data['patient']=$this->Patient_model->getMalePatientMasterList();									
				$this->load->view('patient/reports/printPatientMasterList',$data);										
			}	
			if($list == '3'){
				$data['patient']=$this->Patient_model->getFemalePatientMasterList();									
				$this->load->view('patient/reports/printPatientMasterList',$data);						
			}				
		}	
		public function print_gender(){	
			$data['totalPatient']=$this->Patient_model->getPatientTotal();
			$data['genders']=$this->Patient_model->getPatientGender();
			$this->load->view('patient/reports/reg_gender',$data);			
		}
		
	}
?>