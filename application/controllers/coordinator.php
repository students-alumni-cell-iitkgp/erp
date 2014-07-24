<?php
class Coordinator extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('coordinatorModel');
		$this->load->helper('url');
	}
	
	private function accessCheck(){
		$privilege = $this->session->userdata('privilege');
		if($privilege=='2'){
			return "True";
		}

	}

	public function index(){
		if($this->accessCheck()){
			$data['memberList'] = $this->coordinatorModel->getMembers();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('coordinators/home',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/accessErr');
		}

	}
	public function viewAs($name){
		if($this->accessCheck()){
		$this->session->set_userdata('alias',$name);
		redirect('/member/index','refresh:2');
	}else{
					$this->load->view('templates/accessErr');

	}
}
	public function assignWork(){
		$data = $this->coordinatorModel->getWorkDetail();
		var_dump($data);
		/*$this->load->view('templates/header');
		$this->load->view('coordinators/assign');
		$this->load->view('templates/footer');*/

	}
}


?>