
<?php
	class AnalyticsDashboard extends MY_Controller{
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
			$data['main_content'] = 'analytics/dashboard/dashboardMainUI';
			$this->load->view('analytics/layouts/main',$data);	        
	    }
	}
?>