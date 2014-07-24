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
	public function getUnassignedAlum(){
		$arr = array();
		$i=0;
		$query = $this->db->get_where('alumni',array('assigned'=>0));
		if($query->num_rows()>0){
			foreach ($query->result_array() as $result) {
				$arr[$i] = $result['alumid'];
				$i++;
			}
			return $arr;

		}
	}

	public function getYearofPass($alumid){
		$query = $this->db->get_where('alumni',array('alumid'=>$alumid));
		$result = $query->row_array();
		return $result['alumSince'];
	}
	public function getUserId(){
		if($this->session->userdata('alias')){
			$username =  $this->session->userdata('alias');
			
		}
		
		$query = $this->db->get_where('users',array('username'=>$username));
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result['userid'];
		}
	}

	public function assignWork($from,$to,$member){
		$count = 0;
		for($i=$from;$i<=$to;$i++){
			$year = $this->getYearofPass($i);
			$userid = $this->getUserId();
			$data = array('alumid'=>$i,'userid'=>$userid,'year'=>$year);
			if($this->db->insert('status',$data))
				$count++;	
			$this->db->where('alumid',$i);
			if($this->db->update('alumni',array('assigned'=>1)))
				$count++;
		}
		if($count==2)
			return "success";
		else
			return "failed";



	}



}

?>