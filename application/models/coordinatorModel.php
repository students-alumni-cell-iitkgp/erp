<?php
class CoordinatorModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getMembers(){
		$arr = array();
		$i = 0;
		$this->db->select('name');
		$query = $this->db->get_where('users',array('privilege'=>'1'));
		if($query->num_rows()>0){
			foreach ($query->result_array() as $result) {
				$arr[$i] = $result['name'];
				$i++;
			}
			return $arr;
		}
	}

	public function getWorkDetail(){
		$userid = $this->session->userdata('userid');
		$query = $this->db->get_where('alumni',array('userid'=>$userid));
		return $query->result_array();	
	}



}

?>