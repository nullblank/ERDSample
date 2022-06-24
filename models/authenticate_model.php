<?php
	class Authenticate_model extends CI_model{
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