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

	public function index(){
		//check access
		$data = array('years'=>$this->memberModel->getYearList());
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('members/home',$data);
		//fetch data for networking summary
		//$this->load->view('members/summary');
		$this->load->view('templates/footer');
		
	}

	public function year($year){
		$this->data1 = $this->memberModel->getYearList();
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year);
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}


	}

	public function positive($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"positive");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
	public function negative($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"negative");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
	public function neutral($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"neutral");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}

	public function registered($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"register");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
	public function uncontacted($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"uncontacted");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
	public function unsearched($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"unsearched");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}
	public function notFound($year){
		if(in_array(array('alumSince'=>$year),$this->data1)){// think of a get around
			$data['table'] = $this->memberModel->getTable($year,"notFound");
			$data['year'] = $year;
			$this->load->view('templates/header');
			$this->load->view('members/fullList',$data);
			$this->load->view('templates/footer');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/badParam');
			$this->load->view('templates/footer');
		}

	}

}



?>