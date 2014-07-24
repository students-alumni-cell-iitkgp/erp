<?php
class LoginModel extends CI_Model{

	public function __construct(){
		$this->load->database();

	}

	public function getPrivileges(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->get_where('users', array('username' => $username,'password'=>$password));
		if($query->num_rows()==0){
			return ('-1');
		}else{
			$result = $query->row_array();
			return $result['privilege'];
		}

	}
	public function getUserId($username){
 
 		$query = $this->db->get_where('users',array('username'=>$username));
 		$result = $query->row_array();
 		return $result['userid'];
 	}


}




?>