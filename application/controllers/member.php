<?php
class Member extends CI_Controller{
	public $data1 = "";
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('table');		
		$this->load->model('memberModel');
		$this->data1 = $this->memberModel->getYearList();
	}
	private function accessCheck(){
		$privilege = $this->session->userdata('privilege');
		if($privilege=='2'||$privilege=='1'){
			return "True";
		}

	}

	public function index(){
		if($this->accessCheck()){
		$data = array('years'=>$this->memberModel->getYearList());
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('members/home',$data);
		//fetch data for networking summary
		//$this->load->view('members/summary');
		$this->load->view('templates/footer');
		
	}
else{
	$this->load->view('templates/accessErr');
}}

	public function year($year){
		if($this->accessCheck()){

		$this->data1 = $this->memberModel->getYearList();
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year);
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}


	}else{
	$this->load->view('templates/accessErr');
}}

	public function positive($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"positive");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
else{
	$this->load->view('templates/accessErr');
}}
	public function negative($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"negative");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}
}
	else{
	$this->load->view('templates/accessErr');
}}
	public function neutral($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"neutral");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}

	public function registered($year){
				if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"register");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function uncontacted($year){
						if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"uncontacted");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function unsearched($year){
						if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"unsearched");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
	public function notFound($year){
								if($this->accessCheck()){

		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"notFound");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}else{
	$this->load->view('templates/accessErr');
}}
public function getProfile(){
	$id=$this->input->get('id');
	$data = $this->memberModel->getPrimaryInfo($id);
	echo json_encode($data);
}

}



?>