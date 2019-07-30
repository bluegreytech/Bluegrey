<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
//require_once(APPPATH . 'libraries/facebook.php'); 
class Login extends CI_Controller {

	public function __construct()
	{
      	parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('google');
	
      
	}
	


	function index()
    {
		$data['google_login_url']=$this->google->get_login_url();
			if($this->input->post('logins'))
			{   
					$EmailAddress = $this->input->post('EmailAddress');
					$Password = md5($this->input->post('Password'));
					$IsActive = 1;
					$where = array(
					"EmailAddress"=>$EmailAddress,
					"Password"=>$Password,
					"IsActive"=>$IsActive
					);
					$log = $this->Login_model->login_where('tbluser',$where);           
					$cnt = count($log);
					if($cnt>0)
					{
						$session= array(
								'EmailAddress'=> $log->EmailAddress,
								'UserId'=> $log->UserId,
								'FirstName'=> $log->FirstName,
								'LastName'=> $log->LastName,
								'RoleId'=> $log->RoleId,
							);
							
						$this->session->set_userdata($session);
						$this->session->set_flashdata('success','User Login successfully');
						redirect('index.php/Program/Programlist');
					}
					else
					{
						$this->session->set_userdata($session);
						$this->session->set_flashdata('error', 'Invalid Username Or Password');
						redirect('index.php/Login');	
					} 
				}
				
				$this->load->view('common/login',$data);		
    }
	
	function profile(){
		$google_data=$this->google->validate();
		$session_data=array(
				'oauth_uid'=>$google_data['id'],
				'FirstName'=>$google_data['name'],
				'EmailAddress'=>$google_data['email'],
				'oauth_provider'=>'google',
				'profile_pic'=>$google_data['profile_pic'],
				'link'=>$google_data['link'],
				'sess_logged_in'=>1
				);
				echo "<pre>";print_r($session_data);die;
			$this->session->set_userdata($session_data);
	}
	
	

	public function Fblogin()
	{
		if($_POST)
			{   		
			 	$result = $this->Login_model->getfblogin();     
				if($result!='0')
				{
					$cnt = count($result);	   
					if($cnt>0)
					{
						$datasession= array(
								'EmailAddress'=> $result->EmailAddress,
								'UserId'=> $result->UserId,
								'FirstName'=> $result->FirstName,
								'LastName'=> $result->LastName,
								'RoleId'=> $result->RoleId,
							);		
							$st=$this->session->set_userdata($datasession);						
							$this->session->set_flashdata('success','User Login successfully');
					 		redirect('index.php/Program/Programlist');
					}
					else
					{
							
						$this->session->set_userdata($session);
						$this->session->set_flashdata('error', 'Invalid Username Or Password');
						redirect('index.php/Login');	
					} 
		 
				  }else{
						$result=$this->Login_model->insertdata();
						if($result){

							redirect('index.php/Program/Programlist');
						}
				  }
			
					// $EmailAddress = $this->input->post('email');
					// $Password = md5('123456789');
					// $IsActive = 1;
					// $where = array(
					// "EmailAddress"=>$EmailAddress,
					// "Password"=>$Password,
					// "IsActive"=>$IsActive
					// );
					// $log = $this->Login_model->login_where('tbluser',$where);           
					// $cnt = count($log);
					// if($cnt>0)
					// {
					// 	$session= array(
					// 			'EmailAddress'=> $log->EmailAddress,
					// 			'UserId'=> $log->UserId,
					// 			'FirstName'=> $log->FirstName,
					// 			'LastName'=> $log->LastName,
					// 			'RoleId'=> $log->RoleId,
					// 		);
							
					// 	$this->session->set_userdata($session);
					// 	$this->session->set_flashdata('success','User Login successfully');
					// 	redirect('index.php/Program/Programlist');
					// }
					// else
					// {
					// 	$this->session->set_userdata($session);
					// 	$this->session->set_flashdata('error', 'Invalid Username Or Password');
					// 	redirect('index.php/Login');	
					// } 
		    }


	}

	public function logout()
	{
		
			$this->session->sess_destroy();
			redirect('index.php/Login');
	

	}

	public function dashboard()
	{
		$this->load->view('dashboard');
	}
	
}
