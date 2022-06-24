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
			$config['base_url'] = base_url().'covid/profile/';
			$config['first_link'] = 'First';			
			$config['total_rows']= $this->Covid_model->getCovidsCount();
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
									
			$data['covids'] =$this->Covid_model->get_covids('25',$page);
			$data['links'] = $this->pagination->create_links();
			$session_data = $this->session->userdata('id');
          	$data['usersession']=$this->Administrator_model->get_login($session_data);
			
			$data['main_content'] = 'covid/profile/manageCovidUI';			
			$this->load->view('covid/layouts/main',$data);
		}
			
		public function search(){
			$this->load->library('pagination');
			$this->load->model('Covid_model');
			$key=$this->input->post('searchKey');			
			$this->Covid_model->setSearchBy($key);			
			$searchCovid =$this->Covid_model->search_covid();
			
			if($searchCovid != null){
				$data['covids']=$this->Covid_model->search_covid();
				$data['links'] = $this->pagination->create_links();
				$data['main_content'] = 'covid/profile/manageCovidUI';
				$this->load->view('covid/layouts/main',$data);
			}elseif($searchCovid == null)
			{
				$data['covids']="";
				$data['links'] = $this->pagination->create_links();
				$data['main_content'] = 'covid/profile/manageCovidUI';
				$this->load->view('covid/layouts/main',$data);
			}
		}

		public function showCovid($id){			
			$this->load->library('pagination');			
			$data['covids']=$this->Covid_model->showCovid($id);
			$data['links'] = $this->pagination->create_links();			
			$data['main_content'] = 'covid/profile/manageCovidUI';			
			$this->load->view('covid/layouts/main',$data);			
		}		
				
		public function setters(){
			$c_id =$this->input->post('c_id');
			$c_name =$this->input->post('c_name');
			$c_photo = $this->input->post('c_photo');
			$c_symptom =$this->input->post('c_symptom');
									
			$this->Covid_model->setCID($c_id);
			$this->Covid_model->setCName($c_name);			
			$this->Covid_model->setCPhoto($c_photo);
			$this->Covid_model->setCSymp($c_symptom);	
							
		}			
		public function add(){
			$this->form_validation->set_rules('c_id','ID','required');
			$this->form_validation->set_rules('c_name','Name','required');
			$this->form_validation->set_rules('c_symptom','Symptoms','required');							
				
			if($this->form_validation->run()==FALSE){
				$data['main_content'] = 'covid/profile/addCovidUI';
				$this->load->view('covid/layouts/main',$data);
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
						$data['main_content'] = 'covid/profile/addCovidUI';
						$this->load->view('covid/layouts/main',$data, 'refresh');
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
						$this->Covid_model->setUserID($adminid);
						$this->Covid_model->setUserName($adminname);						
						$this->Covid_model->setCPhoto($image);
						$covid = $this->Covid_model->insert_covid();
						if($covid==TRUE){
							$this->session->set_flashdata('covid_saved','New Covid record has been Saved.');
							redirect('covid/profile');
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
					$this->Covid_model->setUserID($adminid);
					$this->Covid_model->setUserName($adminname);						
					$this->Covid_model->setCPhoto($image);					
					
					$covid = $this->Covid_model->insert_covid();
					if($covid==TRUE){
						$this->session->set_flashdata('covid_saved','New Covid record has been Saved.');
						redirect('covid/profile');
					}	
				}					
			}	
		}
		public function edit($id)
		{					
			$this->Covid_model->setCID($id);
			$vcovid=$this->Covid_model->get_covid_edit();		
			
			$mcovid= $vcovid->c_id;
			if($vcovid == null)
			{
				$this->load->view('404notfoundadmin');
			}
			else
			{
				$this->form_validation->set_rules('c_name','Name','required');
				$this->form_validation->set_rules('c_symptom','Symptom','required');
				$this->Covid_model->setCID($id);
				$data['covid']=$this->Covid_model->get_covid_edit();								

				if($this->form_validation->run()==FALSE)
				{
					$data['main_content'] = 'covid/profile/editCovidUI';
					$this->load->view('covid/layouts/main',$data);
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
						$data['main_content'] = 'covid/profile/editCovidUI';
						$this->load->view('covid/layouts/main',$data, 'refresh');
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
						$this->Covid_model->setUserID($adminid);
						$this->Covid_model->setUserName($adminname);						
						$this->Covid_model->setCPhoto($image);	
						
						$covid = $this->Covid_model->update_covid();
						if($covid==TRUE){
							$this->session->set_flashdata('covid_edit','Covid record has been updated.');					
							redirect('covid/profile/showCovid/'.$mcovid);
						}	
					}
				}
				else{
						$this->setters();
						
						$session_data = $this->session->userdata('id');
						$user = $this->Administrator_model->get_login($session_data);
						$adminid = $user->user_id;	
						$adminname = $user->user_name;							
						$this->Covid_model->setUserID($adminid);
						$this->Covid_model->setUserName($adminname);						
						//$this->Covid_model->setPPhoto($image);	
						
						$covid = $this->Covid_model->update_covid();
						if($covid==TRUE){
							$this->session->set_flashdata('covid_edit','Covid record has been updated.');					
							redirect('covid/profile/showCovid/'.$mcovid);
						}												
					}				
				}
			}
		}													
	}
?>