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

 	public function checkUserName(){


 		$query = $this->db->get_where('users',array('username'=>$this->input->post('username')));
 		if($query->num_rows()>0){
 			return "-1";
 		}else{
 			return "1";
 		}
 	}

 	public function register(){

 		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		$name = $this->input->post('name');
 		$email = $this->input->post('email');

 		if($this->db->insert('users',array('name'=>$name,'username'=>$username,'password'=>$password,'email'=>$email,'privilege'=>'4')))
 			{
 				date_default_timezone_set('Asia/Calcutta');
 				$this->db->insert('notificationsheads',array('notification'=>$name." is trying to register",'date'=>date('Y-m-d')));

 				return "registered";
 			}
 			else{
 			return "unable to regsiter";
 		}


	}

}


?>