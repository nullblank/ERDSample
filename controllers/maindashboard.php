<?php
	class Maindashboard extends MY_Controller{		
		public function __construct(){
			parent:: __construct();
					
		}		
		public function index(){				
			$session_data = $this->session->userdata('id');
		    $data['user']=$this->Authenticate_model->get_login($session_data);
			$this->load->view('login');			
		}				
	}
?>