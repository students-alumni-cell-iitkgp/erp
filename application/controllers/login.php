<?php
class Login extends CI_Controller{

	public function __construct(){
		//need the form helper, form validation.
		parent::__construct(); 
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		
	}
	public function index(){
		//here we need to check if a person is already logged in. In such a case, we will redirect him to his view.
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|md5|min_length[8]');

		if($this->session->userdata('privilege')){
			$this->redirectUser($this->session->userdata('privilege'));
		}

		elseif ($this->form_validation->run() == FALSE)
		{	
			$data['heading'] = "ERP SYSTEM, SAC";
			$this->load->view('templates/header',$data);
			$this->load->view('loginForm');
			$this->load->view('templates/footer');
		}
		else
		{	
			$this->load->model('loginModel');
			$privilege = $this->loginModel->getPrivileges();
			if($privilege=='-1'){
				$message['message'] ="Username Password Mismatch";
				$this->load->view('loginForm',$message);
			}else{
				$this->redirectUser($privilege);
			}
		}
	}

	protected function redirectUser($privilege){
		if(!$this->session->userdata('privilege')){
		$username = $this->input->post('username');
		$userid = $this->loginModel->getUserId($username);
 		$sessData = array('username'=>$username,'privilege'=>$privilege,'userid'=>$userid);
		$this->session->set_userdata($sessData);
		}
		switch ($privilege) {
			case '0':
				header('Refresh:2, url="office"');
				echo 'You have been logged in as office. You are being redirected.';
				break;
			case '1':
				
				header('Refresh:2, url="member"');
				echo 'You have been logged in as a student member. You are being redirected.';
				break;	
			case '2':
				header('Refresh:2, url="coordinator"');
				echo 'You have been logged in as a coordinator. You are being redirected.';
				break;
			case '3':
				header('Refresh:2, url="admin"');
				echo 'You have been logged in as admin. You are being redirected.';
				break;
			case '4':
				echo '<h2>You have either not registered or ypur account has not been activated yet. Contact the admin</h2>';
				break;
		}


	}

	public function logout(){

		$this->session->sess_destroy();
		header('Refresh:2, url="index"');
		echo "You have been logged out. You are being redirected.";
	}


	public function register(){
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|md5|min_length[8]');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('repassword','Reentered Password','trim|required|matches[password]');

		if($this->session->userdata('privilege')){
			$this->redirectUser($this->session->userdata('privilege'));
		}

		elseif ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('templates/header');
			$this->load->view('registerForm');
			$this->load->view('templates/footer');
		}
		else
		{	
			$this->load->model('loginModel');
			$usernameStatus = $this->loginModel->checkUserName();
			if($usernameStatus=='-1'){
				$message['message'] ="Username already exists";
				$this->load->view('registerForm',$message);
			}else{
				if($this->loginModel->register()=="registered"){
					header('Refresh:3,url="index"');
					echo "You have been successfully registered. You can login once your account is approved.You are being redirected back.";
				}else{
					header('Refresh:3,url="index"');
					echo 'There was some problem with the registration. Please try again.';

				}
		}



	}
}
}


?>