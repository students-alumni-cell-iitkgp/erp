<?php
class Login extends CI_Controller{

	public function __construct(){
		//need the form helper, form validation.
		parent::__construct(); 
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|md5');
	}
	public function index(){
		//here we need to check if a person is already logged in. In such a case, we will redirect him to his view.
		if($this->session->userdata('privilege')){
			$this->redirectUser($this->session->userdata('privilege'));
		}

		elseif ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('templates/header');
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
		$sessData = array('username'=>$username,'privilege'=>$privilege);
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
			
		}


	}

	public function logout(){

		$this->session->sess_destroy();
		header('Refresh:2, url="index"');
		echo "You have been logged out. You are being redirected.";
	}

}


?>