<?php
class CoordinatorModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('table');
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="5" cellpadding="6" cellspacing="4">',

                    'heading_row_start'   => '<tr >',// Important
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class="heading">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr class="lookfor" >',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr class="lookfor" >',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

              

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);

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
	public function usernameFromName($name){
		$query = $this->db->get_where('users',array('name'=>$name));
		$result = $query->row_array();
		return $result['username'];

	}
	public function getUnassignedAlum(){
		$arr = array();
		$arr2 = array();
		$i=0;
		$j = 0;
		$this->db->select('alumid');
		$initQuery = $this->db->get('status');
		$result = $initQuery->result_array();
		foreach ($result as $row) {
			$arr2[$j] =$row['alumid']; 
			$j++;
		}
		$query = $this->db->query("SELECT alumid FROM alumni WHERE alumid NOT IN (SELECT alumid FROM status)");
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
	public function getUserId($username=""){
		if($username!=""){
		if($this->session->userdata('alias')){
			$username =  $this->session->userdata('alias');
			
		}else{
			$username = $this->session->userdata('username');
		}
		
		$query = $this->db->get_where('users',array('username'=>$username));
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result['userid'];
		}
	}
	}

public function getUserId2($username){// to be used in work assignment form


		$query = $this->db->get_where('users',array('name'=>$username));
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result['userid'];
	
}
}
	

	public function assignWork($from,$to,$member){
		$count = 0;
		for($i=$from;$i<=$to;$i++){
			
			$userid = $this->getUserId2($member);
			$data = array('alumid'=>$i,'userid'=>$userid);
			if($this->db->insert('status',$data))
				$count++;	
			$this->db->where('alumid',$i);
			
		}
		if($count==1)
			return "success";
		else
			return "failed";



	}
	public function getNotifications(){
		$query = $this->db->get('notifications');
		if($query->num_rows()>0){
			return $this->table->generate($query);
		}else{
			return "No Notification";
		}
	}
	public function verifyPayment($alumid){
		$this->db->where('alumid',$alumid);
		if($this->db->update('status',array('pay'=>2))){
			$this->db->where('alumid',$alumid);
			$this->db->update('notifications',array('status'=>1));
			return true;
		}else{
			return false;
		}
	}



}

?>