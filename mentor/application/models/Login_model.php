<?php

class Login_model extends CI_Model
 {
		function login_where($table,$where)
		{
			$r = $this->db->get_where($table,$where);
			$res = $r->row();
			return $res;
		}

	

		function getfblogin(){
			$data = array(
				'oauth_provider' =>"facebook",				
				"oauth_uid"=>$this->input->post('id'),
			
			);
			 $this->db->select("*");
			 $this->db->from('tbluser');
			 $this->db->where($data);
			 $query=$this->db->get();
			// echo "<pre>gfgf";print_r($query->num_rows());die;
			 if($query->num_rows() > 0){ 
				//echo "fgfd";die;
				return $query->row();
			 }else{
				// echo "else";die;
				 return 0;
			 }
			 
		}


		public function insertdata()
		{
			$FirstName = $this->input->post('first_name');
			$LastName = $this->input->post('last_name');
			$EmailAddress = $this->input->post('email');
			
			$ProfileImage = $this->input->post('picture');
			$data=array(
					"EmailAddress"=>$EmailAddress,
					"FirstName"=>$FirstName,
					"LastName"=>$LastName,
					"RoleId"=>"2",
					'oauth_provider' =>"facebook",
					'oauth_uid' =>$this->input->post('id'),
					"ProfileImage"=>$ProfileImage
			);
			
			$res=$this->db->insert('tbluser',$data);	
			if($res){
				$sdata = array(
					'oauth_provider' =>"facebook",				
					"oauth_uid"=>$this->input->post('id'),
				
				);
				$this->db->select("*");
				$this->db->from('tbluser');
				$this->db->where($sdata);
				$query=$this->db->get();
				echo "<pre>";print_r($query->result());die;

				$sessiondata= array(
					'EmailAddress'=> $log->EmailAddress,
					'UserId'=> $log->UserId,
					'FirstName'=> $log->FirstName,
					'LastName'=> $log->LastName,
					'RoleId'=> $log->RoleId,
				);
				
			return $this->session->set_userdata($sessiondata);
			}
			

		}

		public function updatedata()
		{
			$id=$this->input->post('UserId');
			$data=array('FirstName'=>$this->input->post('FirstName'),
				'LastName'=>$this->input->post('LastName'),
				'EmailAddress'=>$this->input->post('EmailAddress'),
				'Gender'=>$this->input->post('Gender'),
				'ProfileImage'=>$this->input->post('ProfileImage'),
				  );
			$this->db->where("UserId",$id);
			$this->db->update('tbluser',$data);		
			//echo $this->db->last_query();die;
			return 1;
		}

}
