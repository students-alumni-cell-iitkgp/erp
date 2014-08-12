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
		return 'Registered(Unconfirmed)';
		break;

		case '2':
		return 'Registered(Confirmed)';
		break;
	}
	}
	public function response($code){
		switch ($code) {
			case '0':
				return "Not Called";
				break;
			case '1':
				return "Neutral";
				break;
			case '2':
				return "Negative";
				break;
			case '3':
				return "Positive";
				break;
		}
	}
	public function search($code){
		switch ($code) {
			
			case '0':
				return "Yet to be searched";
				break;

			case '1':
				return "Found";
				break;

			case '2':
				return "Not Found";
				break;

			
		}
	}

}