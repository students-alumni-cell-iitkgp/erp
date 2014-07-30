<?php
class Coordinator extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('coordinatorModel');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('from','From alumid','required');
		$this->form_validation->set_rules('to','To alumid','required');
		$this->form_validation->set_rules('member','Member name','required');

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
			$this->assignWork();
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/accessErr');
		}

	}
	public function viewAs($name){
		if($this->accessCheck()){
		$username = $this->coordinatorModel->usernameFromName($name);
		$this->session->set_userdata('alias',$username);
		redirect('/member/index','refresh:2');
	}else{
					$this->load->view('templates/accessErr');

	}
}
public function viewAsSelf(){

	$this->session->unset_userdata('alias');
	redirect('/coordinator/index','refresh:2');
	echo "You are being redirected back";
}
public function assignWork(){
	if($this->accessCheck()){
	if ($this->form_validation->run() == FALSE)
		{	
			$data['fromid'] = $this->coordinatorModel->getUnassignedAlum();
			$data['toid'] = $this->coordinatorModel->getUnassignedAlum();
			$data['members'] = $this->coordinatorModel->getMembers();
			$data['msg'] = "";
			
			$this->load->view('coordinators/assignWork',$data);
			
		}
		else
		{	
			$from = $this->input->post('from');
			$to = $this->input->post('to');
			if($to<$from){
				$data["msg"] = "The To Id can not be smaller than the From Id";
				$data['fromid'] = $this->coordinatorModel->getUnassignedAlum();
				$data['toid'] = $data['fromid'];
				$data['members'] = $this->coordinatorModel->getMembers();
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('coordinators/assignWork',$data);
				$this->load->view('templates/footer');
			}else{
				$member = $this->input->post('member');
				
					if($this->coordinatorModel->assignWork($from,$to,$member)=="success"){
						header('Refresh:2, url="index"');
						echo "Work assigned. You are being redirected back";
					}else{
						header('Refresh:2, url="index"');
						echo "Unable to assign work, you are being redirected back";

					}
				
			}
		}
	
}else{
					$this->load->view('templates/accessErr');

	}
}
public function getNotifications(){
	$data['result'] = $this->coordinatorModel->getNotifications();
	$this->load->view('templates/header');
	$this->load->view('templates/menu');
	$this->load->view('templates/dummy',$data);
	$this->load->view('templates/footer');

}
}


?>