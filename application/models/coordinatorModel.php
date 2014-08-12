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
			
		}
		if($count=$to-$from+1)
		{	
			$query = $this->db->get_where('notificationmembers',array('userid'=>$userid));
			$id = $query->num_rows()+1;
			date_default_timezone_set('Asia/Calcutta');
			$this->db->insert('notificationmembers',array('userid'=>$userid,'id'=>$id,'message'=>"Alumni from ".$from." to ".$to." alloted to you",'date'=>date('Y-m-d')));
			return "success";
		}
		else
			return "Operation partially failed. Contact the admin";



	}
	public function getNotifications(){
		$this->db->where('status',0);
		$query = $this->db->get('notificationsheads');
		if($query->num_rows()>0){
			return $this->table->generate($query);
		}else{
			return "<h2>No Notification!!</h2>";
		}
	}
	

public function numberOfNotifications(){
	$query = $this->db->get_where('notificationsheads',array('status'=>'0'));
	return $query->num_rows();
}

public function showVerifyPayment(){
	$query = $this->db->query('SELECT alumni.alumid,alumni.FirstName,alumni.LastName,alumni.alumSince,payment.dateofpayment,payment.referenceNo,payment.paymentAmt,payment.remarks FROM alumni JOIN status ON status.alumid = alumni.alumid JOIN payment ON payment.alumid = alumni.alumid WHERE status.pay=1');
	if($query->num_rows()>0)
		return $this->table->generate($query);
	else
		return "<h2>Nothing here, move along!</h2>";
}
public function showVerifyRegistration(){
	$query = $this->db->query('SELECT alumni.alumid,alumni.FirstName,alumni.LastName,alumni.alumSince,alumni.Department FROM alumni JOIN status ON status.alumid = alumni.alumid WHERE status.register=1');
	if($query->num_rows()>0)
		return $this->table->generate($query);
	else
		return "<h2>Nothing here, move along!</h2>";
}
public function verifyRegistration($alumid){
	$this->db->where('alumid',$alumid);
	if($this->db->update('status',array('register'=>2)))
		return "success";
}
public function verifyPayment($alumid){
	$this->db->where('alumid',$alumid);
	if($this->db->update('status',array('pay'=>2)))
		return "success";
}
public function getNetworkingSummary($year=0){
	if($year!=0){
			$data['total'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year    ")->num_rows();
			$data['found'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.search = 1")->num_rows();
			$data['yettobesearched'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.search = 0")->num_rows();
			$data['notfound'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.search = 2")->num_rows();
			$data['neutral'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.called = 1")->num_rows();
			$data['positive'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.called = 3")->num_rows();
			$data['negative'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.called = 3")->num_rows();
			$data['called2way'] = $data['neutral']+$data['positive']+$data['negative']; 
			$data['register'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND  status.register= 2")->num_rows();
			$data['paid'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE alumni.alumSince = $year AND status.pay= 2")->num_rows();

		

		}
		else{
			$data['total'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid")->num_rows();
			$data['found'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE     status.search = 1")->num_rows();
			$data['yettobesearched'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE      status.search = 0")->num_rows();
			$data['notfound'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.search = 2")->num_rows();
			$data['neutral'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.called = 1")->num_rows();
			$data['positive'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.called = 3")->num_rows();
			$data['negative'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.called = 3")->num_rows();
			$data['called2way'] = $data['neutral']+$data['positive']+$data['negative'];
			$data['register'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.register= 2")->num_rows();
			$data['paid'] = $this->db->query("SELECT status.* FROM status JOIN alumni ON alumni.alumid = status.alumid WHERE status.pay= 2")->num_rows();
			

		}
		return $data;
}

public function updateNotificationStatus($id){
	
	
	$this->db->where('id',$id);
	$this->db->update('notificationsheads',array('status'=>1));
	
}

public function getUnregistered(){
	$query = $this->db->get_where('users',array('privilege'=>4));
	$data = '';
	
	if($query->num_rows()>0){
	foreach ($query->result_array() as $row) {
		$data .= form_open('coordinator/confirmRegister',array('class'=>'form-inline')).'<input class="form-control" name="userid" type="hidden" value="'.$row['userid'].'"/><input class="form-control" name="name" type="text" value="'.$row['name'].'" disabled/><input name="email" class="form-control" type="text" value="'.$row['email'].'" disabled><input class="form-control" type="submit" name="submit" class="btn btn-success" value="Confirm Registration"/></form>';
	}
	
}
return $data;
}
}

?>