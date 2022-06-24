<?php
	class Patient_model extends CI_model{	

		private $userid, $pid;
		private $p_last, $p_first, $p_mi;
		private $p_brgy, $p_municipality, $p_province;
		private $p_bday, $p_gender, $p_age;
		private $p_cpnumberm, $p_photo;
		private $username, $searchKey;
		
		public function setUserID($UserID){$this->userid = $UserID;}
		public function getUserID(){return $this->userid;}
		
		public function setUserName($UserName){$this->username = $UserName;}
		public function getUserName(){return $this->username;}
		
		public function setPID($PID){$this->pid = $PID;}
		public function getPID(){return $this->pid;}
	
		public function setPLast($PLast){$this->p_last = $PLast;}
		public function getPLast(){return $this->p_last;}	

		public function setPFirst($PFirst){$this->p_first = $PFirst;}
		public function getPFirst(){return $this->p_first;}	

		public function setPmi($Pmi){$this->p_mi = $Pmi;}
		public function getPmi(){return $this->p_mi;}	
		
		public function setPBrgy($PBrgy){$this->p_brgy = $PBrgy;}
		public function getPBrgy(){return $this->p_brgy;}				

		public function setPMunicipality($PMunicipality){$this->p_municipality = $PMunicipality;}
		public function getPMunicipality(){return $this->p_municipality;}				


		public function setPProvince($PProvince){$this->p_province = $PProvince;}
		public function getPProvince(){return $this->p_province;}				

		public function setPBday($PBday){$this->p_bday = $PBday;}
		public function getPBday(){return $this->p_bday;}				

		public function setPGender($PGender){$this->p_gender = $PGender;}
		public function getPGender(){return $this->p_gender;}				


		public function setPAge($PAge){$this->p_age = $PAge;}
		public function getPAge(){return $this->p_age;}
		
		public function setPCPNumber($PCPNumber){$this->p_cpnumber = $PCPNumber;}
		public function getPCPNumber(){return $this->p_cpnumber;}
		
		public function setPPhoto($PPhoto){$this->p_photo = $PPhoto;}
		public function getPPhoto(){return $this->p_photo;}
		
		public function setSearchBy($SearchKey){$this->searchKey = $SearchKey;}
		public function getSearchBy(){return $this->searchKey;}
		
		public function insert_patient(){			
			$data=array(						
				'pid' =>$this->getPID(),
				'p_last' =>$this->getPLast(),
				'p_first' =>$this->getPFirst(),
				'p_mi' =>$this->getPmi(),
				'p_brgy' =>$this->getPBrgy(),
				'p_municipality' =>$this->getPMunicipality(),
				'p_province' =>$this->getPProvince(),
				'p_bday' =>$this->getPBday(),
				'p_gender'=>$this->getPGender(),
				'p_age' =>$this->getPAge(),	
				'p_cpnumber' => $this->getPCPNumber(),		
				'p_photo' =>$this->getPPhoto()
			);									
			$query = $this->db->insert('tblpatient',$data);				
			if($query==true){
				$data=array(
					'action' => 'INSERTED the record of '.$this->getPFirst().' '.$this->getPLast(),
					'tablename' => 'tblpatient',
					'userid' => $this->getUserID(),
					'username' => $this->getUserName()				
				);
				$this->db->insert('audit',$data);
				return true;
			}								
		}
		public function update_patient(){
			if($this->getPPhoto()==null){
				if($this->getPBday()==null){
					$data=array(				
						'pid' =>$this->getPID(),
						'p_last' =>$this->getPLast(),
						'p_first' =>$this->getPFirst(),
						'p_mi' =>$this->getPmi(),
						'p_brgy' =>$this->getPBrgy(),
						'p_municipality' =>$this->getPMunicipality(),
						'p_province' =>$this->getPProvince(),
						'p_bday' =>$this->getPBday(),
						'p_gender'=>$this->getPGender(),
						'p_age' =>$this->getPAge(),	
						'p_cpnumber' => $this->getPCPNumber()							
							
				);
				}else{
					$data=array(				
						'pid' =>$this->getPID(),
						'p_last' =>$this->getPLast(),
						'p_first' =>$this->getPFirst(),
						'p_mi' =>$this->getPmi(),
						'p_brgy' =>$this->getPBrgy(),
						'p_municipality' =>$this->getPMunicipality(),
						'p_province' =>$this->getPProvince(),
						'p_bday' =>$this->getPBday(),
						'p_gender'=>$this->getPGender(),
						'p_age' =>$this->getPAge(),	
						'p_cpnumber' => $this->getPCPNumber()							
											
					);
				}				
			} else {
				if($this->getPBday()==null){
					$data=array(
						'pid' =>$this->getPID(),
						'p_last' =>$this->getPLast(),
						'p_first' =>$this->getPFirst(),
						'p_mi' =>$this->getPmi(),
						'p_brgy' =>$this->getPBrgy(),
						'p_municipality' =>$this->getPMunicipality(),
						'p_province' =>$this->getPProvince(),						
						'p_gender'=>$this->getPGender(),
						'p_age' =>$this->getPAge(),	
						'p_cpnumber' => $this->getPCPNumber(),							
						'p_photo' =>$this->getPPhoto()
					);
				}else {				
				$data=array(
						'pid' =>$this->getPID(),
						'p_last' =>$this->getPLast(),
						'p_first' =>$this->getPFirst(),
						'p_mi' =>$this->getPmi(),
						'p_brgy' =>$this->getPBrgy(),
						'p_municipality' =>$this->getPMunicipality(),
						'p_province' =>$this->getPProvince(),
						'p_bday' =>$this->getPBday(),
						'p_gender'=>$this->getPGender(),
						'p_age' =>$this->getPAge(),	
						'p_cpnumber' => $this->getPCPNumber(),							
						'p_photo' =>$this->getPPhoto()						
					);
				}
			}
			$this->db->where('pid',$this->getPID());
			$query = $this->db->update('tblpatient',$data);			
												
			if($query==true){
				$data=array(
					'action' => 'UPDATED the record of '.$this->getPFirst().' '.$this->getPLast(),
					'tablename' => 'tblpatient',
					'userid' => $this->getUserID(),
					'username' => $this->getUserName()					
				);
				$this->db->insert('audit',$data);
				return true;
			}		
		}		
		public function getPatientsCount() {
			return $this->db->count_all('tblpatient');			
		}	
		
		public function get_patients($limit,$offset){
			$this->db->limit($limit,$offset);
			$this->db->select('*');
			$this->db->from('tblpatient');			
			$query=$this->db->get();				
			return $query->result();
		}
		
		public function getBarangay(){
			$this->db->select('*');
			$this->db->from('barangay');
			$this->db->order_by('barangay','asc');
			$query=$this->db->get();
			$query->num_rows();
			return $query->result();
		}
		public function getMunicipality(){
			$this->db->select('*');
			$this->db->from('municipality');
			$this->db->order_by('municipality','asc');
			$query=$this->db->get();
			$query->num_rows();
			return $query->result();
		}		
		
		public function getProvince(){
			$this->db->select('*');
			$this->db->from('province');
			$this->db->order_by('province','asc');
			$query=$this->db->get();
			$query->num_rows();
			return $query->result();
		}	
					
		public function get_patient(){
			
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->where('pid',$this->getPID());			
			$query=$this->db->get();				
			return $query->result();
		}

		public function showPatient($id){
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->where('pid',$id);			
			$query=$this->db->get();				
			return $query->result();			
		}
		
		public function get_patient_edit(){
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->where('pid',$this->getPID());			
			$query=$this->db->get();				
			return $query->row();						
		}

		public function search_patient(){			
			$this->db->select('*');
			$this->db->from('tblpatient');			
			$this->db->like('pid',$this->getSearchBy(),'after');		
			$this->db->or_like('p_last',$this->getSearchBy(),'after');
			$this->db->or_like('p_first',$this->getSearchBy(),'after');
			$this->db->order_by('p_last','asc');
			$query=$this->db->get();
			return $query->result();			
		}	

		public function getPatientMasterList()	{
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->order_by('p_last','asc');			
			$query=$this->db->get();				
			return $query->result();						
		}	
		public function getMalePatientMasterList()	{
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->where('p_gender','Male');	
			$this->db->order_by('p_last','asc');			
			$query=$this->db->get();				
			return $query->result();						
		}

		public function getFemalePatientMasterList()	{
			$this->db->select('*');
			$this->db->from('tblpatient');	
			$this->db->where('p_gender','Female');	
			$this->db->order_by('p_last','asc');			
			$query=$this->db->get();				
			return $query->result();						
		}
		public function getPatientGender() {			
			$this->db->select('*');
			$this->db->from('view_patient_gender');		
			$query=$this->db->get();			
			$query->num_rows();			
			return $query->result();
		}	
		public function getPatientTotal() {
			$this->db->select('count(pid) as total');
			$this->db->from('tblpatient');				
			$query=$this->db->get();											
			return $query->row();			
		}	
		
	}	
?>