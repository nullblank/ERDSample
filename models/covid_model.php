<?php
	class Covid_model extends CI_model{	

		private $userid, $c_id;
		private $c_name, $c_photo, $c_symptom;
		private $username, $searchKey;
		
		public function setUserID($UserID){$this->userid = $UserID;}
		public function getUserID(){return $this->userid;}
		
		public function setUserName($UserName){$this->username = $UserName;}
		public function getUserName(){return $this->username;}
		
		public function setCID($CID){$this->c_id = $CID;}
		public function getCID(){return $this->c_id;}
	
		public function setCName($CName){$this->c_name = $CName;}
		public function getCName(){return $this->c_name;}	


		public function setCPhoto($CPhoto){$this->c_photo = $CPhoto;}
		public function getCPhoto(){return $this->c_photo;}

		public function setCSymp($CSymp){$this->c_symptom = $CSymp;}
		public function getCSymp(){return $this->c_symptom;}
		
		public function setSearchBy($SearchKey){$this->searchKey = $SearchKey;}
		public function getSearchBy(){return $this->searchKey;}
		
		public function insert_covid(){			
			$data=array(						
				'c_id' =>$this->getCID(),
				'c_name' =>$this->getCName(),		
				'c_photo' =>$this->getCPhoto(),
				'c_symptom' =>$this->getCSymp()
			);									
			$query = $this->db->insert('covid',$data);				
			if($query==true){
				$data=array(
					'action' => 'INSERTED the record of '.$this->getCName(),
					'tablename' => 'covid',
					'userid' => $this->getUserID(),
					'username' => $this->getUserName()				
				);
				$this->db->insert('audit',$data);
				return true;
			}								
		}
		public function update_covid(){
			if($this->getCPhoto()==null){
				if($this->getCName()==null){
					$data=array(				
						'c_id' =>$this->getCID(),
						'c_name' =>$this->getCName(),		
						'c_photo' =>$this->getCPhoto(),
						'c_symptom' =>$this->getCSymptom()		
					);
				}else{
					$data=array(				
						'c_id' =>$this->getCID(),
						'c_name' =>$this->getCName(),		
						'c_photo' =>$this->getCPhoto(),
						'c_symptom' =>$this->getCSymp()
					);
				}				
			} else {
				if($this->getCSymp()==null){
					$data=array(
						'c_id' =>$this->getCID(),
						'c_name' =>$this->getCName(),		
						'c_photo' =>$this->getCPhoto(),
						'c_symptom' =>$this->getCSymp()	
					);
				}else {				
				$data=array(
						'c_id' =>$this->getCID(),
						'c_name' =>$this->getCName(),		
						'c_photo' =>$this->getCPhoto(),
						'c_symptom' =>$this->getCSymp()						
					);
				}
			}
			$this->db->where('c_id',$this->getCID());
			$query = $this->db->update('covid',$data);			
												
			if($query==true){
				$data=array(
					'action' => 'UPDATED the record of '.$this->getCName(),
					'tablename' => 'covid',
					'userid' => $this->getUserID(),
					'username' => $this->getUserName()					
				);
				$this->db->insert('audit',$data);
				return true;
			}		
		}		
		public function getCovidsCount() {
			return $this->db->count_all('covid');			
		}	
		
		public function get_covids($limit,$offset){
			$this->db->limit($limit,$offset);
			$this->db->select('*');
			$this->db->from('covid');			
			$query=$this->db->get();				
			return $query->result();
		}
					
		public function get_covid(){
			
			$this->db->select('*');
			$this->db->from('covid');	
			$this->db->where('c_id',$this->getCID());			
			$query=$this->db->get();				
			return $query->result();
		}

		public function showCovid($id){
			$this->db->select('*');
			$this->db->from('covid');	
			$this->db->where('c_id',$id);			
			$query=$this->db->get();				
			return $query->result();			
		}
		
		public function get_covid_edit(){
			$this->db->select('*');
			$this->db->from('covid');	
			$this->db->where('c_id',$this->getCID());			
			$query=$this->db->get();				
			return $query->row();						
		}

		public function search_covid(){			
			$this->db->select('*');
			$this->db->from('covid');			
			$this->db->like('c_id',$this->getSearchBy(),'after');		
			$this->db->or_like('c_name',$this->getSearchBy(),'after');
			$this->db->order_by('c_name','asc');
			$query=$this->db->get();
			return $query->result();			
		}	

		public function getCovidMasterList()	{
			$this->db->select('*');
			$this->db->from('covid');	
			$this->db->order_by('c_name','asc');			
			$query=$this->db->get();				
			return $query->result();						
		}	
		
		public function getCovidTotal() {
			$this->db->select('count(c_id) as total');
			$this->db->from('covid');				
			$query=$this->db->get();											
			return $query->row();			
		}	
		
	}	
?>