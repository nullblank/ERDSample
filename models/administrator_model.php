<?php
	class Administrator_model extends CI_model{
		
		private $userid;	
		private $id;		
		private $user_name;
		private $user_role;
		private $user_account;
		private $user_password;
		private $user_id;
		private $user_created;
		private $user_isactive;
		private $user_photo;
				
		public function setUserName($Username) { $this->user_name=$Username;}
		public function getUserName(){ return $this->user_name;}
		
		public function setUserRole($Userrole) { $this->user_role=$Userrole;}
		public function getUserRole(){ return $this->user_role;}
		
		public function setUserAccount($Useraccount) { $this->user_account=$Useraccount;}
		public function getUserAccount(){ return $this->user_account;}
			
		public function setUserPassword($Userpassword) { $this->user_password=$Userpassword;}
		public function getUserPassword(){ return $this->user_password;}
				
		public function setUserIDN($Userid) { $this->user_id=$Userid;}
		public function getUserIDN (){ return $this->user_id;}
			
		public function setUserCreated($Usercreated) { $this->user_created=$Usercreated;}
		public function getUserCreated(){ return $this->user_created;}
	
		public function setUserIsActive($Userisactive) { $this->user_isactive=$Userisactive;}
		public function getUserIsActive(){ return $this->user_isactive;}
	
		public function setUserPhoto($Userphoto) { $this->user_photo=$Userphoto;}
		public function getUserPhoto(){ return $this->user_photo;}
									
		public function setUserID($UserID){$this->userid = $UserID;}
		public function getUserID(){return $this->userid;}

		public function get_user_details(){
			$this->db->select('*');
			$this->db->from('tblusers');
			$this->db->where('user_account',trim($this->getUsername()));					
			$query=$this->db->get();				
			return $query->row();	
		}				
		
		
		
		
		public function login_user($username,$password){						
			//$enc_password = md5($password);	
			$enc_password = $password;	
			$this->db->select('*'); 
			$this->db->from('tblusers');
			$this->db->where('user_account',$username);
			$this->db->where('user_password',$enc_password);
			$this->db->where('user_isactive = 1');						
			$result=$this->db->get();			
			if($result->num_rows() == 1){
				return $result->row();
			}else{
				return false;
			}			
		}		
		public function get_login($session_data){
			$this->db->select('*');
			$this->db->from('tblusers');
			$this->db->where('user_id', $session_data);
			$this->db->where('user_isactive = 1');					
			$result=$this->db->get();			
			if($result->num_rows() == 1){
				return $result->row();
			}else{
				return false;
			}
		}							
	}
?>