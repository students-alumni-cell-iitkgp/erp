<?php
class Codeparser extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function register($code){
		switch($code){
		case '0':
		return 'Not Registered';
		break;

		case '1':
		return 'Registered';
		break;
	}
	}

}