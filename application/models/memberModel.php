<?php
class MemberModel extends CI_Model{

	public function __construct(){
		$this->load->database();
		$this->load->library('table');

	}
	public function getUserId(){
		if($this->session->userdata('alias')){
			$username =  $this->session->userdata('alias');
			
		}
		else{
			$username = $this->session->userdata('username');
		}
		$query = $this->db->get_where('users',array('username'=>$username));
		if($query->num_rows()>0){
			$result = $query->row_array();
			return $result['userid'];
		}
	}

	public function getYearList(){
		$this->db->select('alumSince');
		$this->db->distinct();
		$query = $this->db->get('alumni');
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function getTable($year,$list="FullList"){
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
		if($list=="FullList")
			return $this->FullList($year);
		elseif($list=="positive")
			return $this->Positive($year);
		elseif($list=="negative")	
			return $this->Negative($year);
		elseif($list=="neutral")
			return $this->Negative($year);
		elseif($list=="register")
			return $this->Register($year);
		elseif($list=="uncontacted")
			return $this->Uncontacted($year);
		elseif($list=="unsearched")
			return $this->Unsearched($year);
		elseif($list=="notFound")
			return $this->Unsearched($year);
	}

	public function FullList($year){
		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$table = $this->table->generate();
			return $table;
		}
	}

	public function Positive($year){
		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'3'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}
	}

	public function Negative($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'2'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}
	
	public function Neutral($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'1'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}
	public function Register($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'register'=>'1'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}
	public function Uncontacted($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'called'=>'0'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}
	public function Unsearched($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'search'=>'0'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}
	public function notFound($year){

		$table = "";
		$userid = $this->getUserId();
		$query = $this->db->get_where('status',array('userid'=>$userid,'year'=>$year,'search'=>'-1'));
		if($query->num_rows==0){
			return -1;
		}else{
			foreach ($query->result_array() as $row) {
				
				$listQuery = $this->db->query("SELECT * FROM alumni WHERE alumid = {$row['alumid']}");
				$table = $this->table->add_row($listQuery->row_array());
			}
			$this->table->generate();
			return $table;
		}

	}


	public function getPrimaryInfo($id){
		$query = $this->db->get_where('alumni',array('alumid'=>$id));
		if($query->num_rows()>0){
			$result = $query->row_array();
			$data['name'] = $result['name'];
			$data['hall'] = $result['hall'];
			$data['year'] = $result['alumSince'];
			//$data['department'] = $result['department'];
			return $data;
		}
	}

	public function search(){
		$this->table->clear();
		$tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr><th></th>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl); 

		$sql = "SELECT * FROM alumni WHERE";
		$count= 0;
		if(isset($_POST['submit'])){
			
			foreach ($_POST as $key => $value) {
				if($key!=$value && $key!="submit"){
					$this->db->escape($key);
					$this->db->escape($value);
					if($count==0)
					$sql .=" $key='$value'";
				 	else
					$sql .=" AND $key='$value'";
					$count++;
					//echo $sql;
				}
			}
					$query = mysql_query($sql);
					if($query && $sql!="SELECT * FROM alumni WHERE" ){
						$num_rows = mysql_num_rows($query);

						while ($row = mysql_fetch_array($query)) {
							foreach ($row as $key1 => $value1) {
								if(is_string($key1))
									$dota[$key1] = $value1;
							}
							$this->table->add_row($dota);
						}
						$fields  = $this->db->list_fields('alumni');
	if($fields){
	$this->table->set_heading($fields);
	}

						$data['table'] =  $this->table->generate();
						$data['num_rows'] = $num_rows;
						return $data;
	}else{
		$data['errMsg'] = "Please specify atleast one parameter";
		return  $data;
	}
	
}
}
}








?>