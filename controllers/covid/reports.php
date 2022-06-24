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
			$data['main_content'] = 'covid/reports/manageReportsUI';			
			$this->load->view('covid/layouts/main',$data);
		}
		public function print_report() {			
			$list=$this->input->post('list');				
			if($list == '1'){													
				$data['covid']=$this->Covid_model->getCovidMasterList();									
				$this->load->view('covid/reports/printCovidMasterList',$data);					
			}	
			if($list == '2'){					
				$data['covid']=$this->Covid_model->getMaleCovidMasterList();									
				$this->load->view('covid/reports/printCovidMasterList',$data);										
			}	
			if($list == '3'){
				$data['covid']=$this->Covid_model->getFemaleCovidMasterList();									
				$this->load->view('covid/reports/printCovidMasterList',$data);						
			}				
		}	
	}
?>