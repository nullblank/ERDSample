<?php
	class Profile extends MY_Controller{
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
			$this->load->library('pagination');						
			$config['base_url'] = base_url().'patient/profile/';
			$config['first_link'] = 'First';			
			$config['total_rows']= $this->Patient_model->getPatientsCount();
			$config['per_page'] = '25'; 
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close']= '</ul>';			
			$config['first_tag_open'] = '<li>';
			$config['last_tag_open']= '<li>';			
			$config['next_tag_open'] = '<li>';
			$config['prev_tag_open']= '<li>';			
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close']= '</li>';			
			$config['first_tag_close'] = '</li>';
			$config['last_tag_close']= '</li>';			
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_close']= '</li>';			
			$config['cur_tag_open'] = "<li class=\"active\"><span><b>";
			$config['cur_tag_close']= "</b></span></li>";			
			$this->pagination->initialize($config);
			$page= $this->uri->segment(3);
									
			$data['patients'] =$this->Patient_model->get_patients('25',$page);
			$data['links'] = $this->pagination->create_links();
			$session_data = $this->session->userdata('id');
          	$data['usersession']=$this->Administrator_model->get_login($session_data);
			
			$data['main_content'] = 'patient/profile/managePatientUI';			
			$this->load->view('patient/layouts/main',$data);
		}
			
		public function search(){
			$this->load->library('pagination');
			$this->load->model('Patient_model');
			$key=$this->input->post('searchKey');			
			$this->Patient_model->setSearchBy($key);			
			$searchPatient =$this->Patient_model->search_patient();
			
			if($searchPatient != null){
				$data['patients']=$this->Patient_model->search_patient();
				$data['links'] = $this->pagination->create_links();
				$data['main_content'] = 'patient/profile/managePatientUI';
				$this->load->view('patient/layouts/main',$data);
			}elseif($searchPatient == null)
			{
				$data['patients']="";
				$data['links'] = $this->pagination->create_links();
				$data['main_content'] = 'patient/profile/managePatientUI';
				$this->load->view('patient/layouts/main',$data);
			}
		}

		public function showPatient($id){			
			$this->load->library('pagination');			
			$data['patients']=$this->Patient_model->showPatient($id);
			$data['links'] = $this->pagination->create_links();			
			$data['main_content'] = 'patient/profile/managePatientUI';			
			$this->load->view('patient/layouts/main',$data);			
		}		
				
		public function setters(){
			$pid =$this->input->post('pid');
			$p_last =$this->input->post('p_last');
			$p_first = $this->input->post('p_first');
			$p_mi =$this->input->post('p_mi');
			$p_brgy =$this->input->post('p_brgy');
			$p_municipality =$this->input->post('p_municipality');
			$p_province =$this->input->post('p_province');
			$p_bday =$this->input->post('p_bday');
			$p_gender=$this->input->post('p_gender');
			$p_age=$this->input->post('p_age');	
			$p_cpnumber=$this->input->post('p_cpnumber');				
			$p_photo =$this->input->post('p_photo');
									
			$this->Patient_model->setPID($pid);
			$this->Patient_model->setPLast($p_last);			
			$this->Patient_model->setPFirst($p_first);
			$this->Patient_model->setPmi($p_mi);
			$this->Patient_model->setPBrgy($p_brgy);
			$this->Patient_model->setPMunicipality($p_municipality);
			$this->Patient_model->setPProvince($p_province);
			$this->Patient_model->setPBday($p_bday);
			$this->Patient_model->setPGender($p_gender);
			$this->Patient_model->setPAge($p_age);									
			$this->Patient_model->setPCPNumber($p_cpnumber);																				
			$this->Patient_model->setPPhoto($p_photo);	
							
		}			
		public function add(){
			$this->form_validation->set_rules('pid','ID','required');
			$this->form_validation->set_rules('p_first','First Name','required');
			$this->form_validation->set_rules('p_last','Last Name','required');					
			$data['brgy'] = $this->Patient_model->getBarangay();
			$data['municipality'] = $this->Patient_model->getMunicipality();		
			$data['province'] = $this->Patient_model->getProvince();		
				
			if($this->form_validation->run()==FALSE){
				$data['main_content'] = 'patient/profile/addPatientUI';
				$this->load->view('patient/layouts/main',$data);
			}
			else{
				if($_FILES['photo']['size'] != 0){
					$upload_dir = './uploads/';
					if (!is_dir($upload_dir)) {
						 mkdir($upload_dir);
					}	
					$config['upload_path'] = './photos/';
					$config['allowed_types']= 'jpg|jpeg|JPG|png|PNG|gif|Gif';
					$config['max_size'] = 1000;					
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('photo'))
					{
						$this->session->set_flashdata('upload_error', "The filetype you are attempting to upload is not allowed. Please upload Jpg,Jpeg,Gif and Png files only.");
						$data['main_content'] = 'patient/profile/addPatientUI';
						$this->load->view('patient/layouts/main',$data, 'refresh');
					}
					else
					{						
						$this->setters();
						$upload_data = $this->upload->data();
						$image = $upload_data['file_name'];
						$session_data = $this->session->userdata('id');
						$user = $this->Administrator_model->get_login($session_data);
						
						$adminid = $user->user_id;	
						$adminname = $user->user_name;	
						$this->Patient_model->setUserID($adminid);
						$this->Patient_model->setUserName($adminname);						
						$this->Patient_model->setPPhoto($image);
						$patient = $this->Patient_model->insert_patient();
						if($patient==TRUE){
							$this->session->set_flashdata('patient_saved','New Patient record has been Saved.');
							redirect('patient/profile');
						}	
					}
				}
				else{
					$this->setters();				
					//$upload_data = $this->upload->data();
					$image =''; //$upload_data['file_name'];
					$session_data = $this->session->userdata('id');
					$user = $this->Administrator_model->get_login($session_data);
					$adminid = $user->user_id;	
					$adminname = $user->user_name;						
					$this->Patient_model->setUserID($adminid);
					$this->Patient_model->setUserName($adminname);						
					$this->Patient_model->setPPhoto($image);					
					
					$patient = $this->Patient_model->insert_patient();
					if($patient==TRUE){
						$this->session->set_flashdata('patient_saved','New Patient record has been Saved.');
						redirect('patient/profile');
					}	
				}					
			}	
		}
		public function edit($id)
		{					
			$this->Patient_model->setPID($id);
			$vpatient=$this->Patient_model->get_patient_edit();		
			
			$mpatient= $vpatient->pid;
			if($vpatient == null)
			{
				$this->load->view('404notfoundadmin');
			}
			else
			{
				$this->form_validation->set_rules('p_last','Last Name','required');
				$this->form_validation->set_rules('p_first','First Name','required');
				$this->Patient_model->setPID($id);
				$data['patient']=$this->Patient_model->get_patient_edit();							
				$data['brgy'] = $this->Patient_model->getBarangay();
				$data['municipality'] = $this->Patient_model->getMunicipality();		
				$data['province'] = $this->Patient_model->getProvince();		

				if($this->form_validation->run()==FALSE)
				{
					$data['main_content'] = 'patient/profile/editPatientUI';
					$this->load->view('patient/layouts/main',$data);
				}
				else
				{
					if($_FILES['photo']['size'] != 0){
					$upload_dir = './uploads/';
					if (!is_dir($upload_dir)) {
						 mkdir($upload_dir);
					}	
					$config['upload_path'] = './photos/';					
					$config['allowed_types']= 'jpg|jpeg|JPG|png|PNG|gif|Gif';
					$config['max_size'] = 1000;					
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('photo'))
					{
						$this->session->set_flashdata('upload_error', "The filetype you are attempting to upload is not allowed. Please upload Jpg,Jpeg,Gif and Png files only.");
						$data['main_content'] = 'patient/profile/editPatientUI';
						$this->load->view('patient/layouts/main',$data, 'refresh');
					}
					else
					{						
						$this->setters();
						$upload_data = $this->upload->data();
						$image = $upload_data['file_name'];
						$session_data = $this->session->userdata('id');
						$user = $this->Administrator_model->get_login($session_data);
						$adminid = $user->user_id;
						$adminname = $user->user_name;							
						$this->Patient_model->setUserID($adminid);
						$this->Patient_model->setUserName($adminname);						
						$this->Patient_model->setPPhoto($image);	
						
						$patient = $this->Patient_model->update_patient();
						if($patient==TRUE){
							$this->session->set_flashdata('patient_edit','Patient record has been updated.');					
							redirect('patient/profile/showPatient/'.$mpatient);
						}	
					}
				}
				else{
						$this->setters();
						
						$session_data = $this->session->userdata('id');
						$user = $this->Administrator_model->get_login($session_data);
						$adminid = $user->user_id;	
						$adminname = $user->user_name;							
						$this->Patient_model->setUserID($adminid);
						$this->Patient_model->setUserName($adminname);						
						//$this->Patient_model->setPPhoto($image);	
						
						$patient = $this->Patient_model->update_patient();
						if($patient==TRUE){
							$this->session->set_flashdata('patient_edit','Patient record has been updated.');					
							redirect('patient/profile/showPatient/'.$mpatient);
						}												
					}				
				}
			}
		}													
	}
?>