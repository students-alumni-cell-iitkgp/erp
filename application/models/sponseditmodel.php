<?php

class sponseditmodel extends CI_Model{

	public function __construct(){

		parent::__construct();

		$this->load->database();

		$this->load->library('session');

		$this->load->model('sponsmodel');

	}

	public function getFields($companyid){
		// $query = "SELECT * from sponsdata sd 
		// JOIN sponscalling sc on sd.companyid=sc.companyid 
		// JOIN sponsproposal sp on sd.companyid=sp.companyid 
		// JOIN sponsaux sa on sd.companyid=sa.companyid 
		// WHERE sd.companyid='$companyid'";

		$query = "SELECT * from sponsdata
		natural join sponscalling
		natural join sponsproposal
		natural join sponsaux
		where companyid='$companyid'";

		$res = $this->db->query($query);

		$field_name = $res->list_fields();

		$values = $this->sponsmodel->getFullData($companyid);

		$values = $values['data']; // the returned value will be an array with the data index
									// containing all the values.

		// print_r($res->list_fields());

		return array('fieldData'=>$field_name,
			'fieldVal'=>$values);

	}

	public function updateRecord($input_data, $companyid){

		$fields = $input_data['fieldData'];

		$query = "update sponsdata 
					natural join sponscalling
					natural join sponsproposal
					natural join sponsaux
					set ";

		$queryEnd = "where companyid='$companyid'";

		$fields = array_values($fields);

		for($i = 2; $i < count($fields); $i = $i + 1){
			$query = $query.' '.$fields[$i].'="'.$_POST[$fields[$i]].'"' ;

			if($i != count($fields) - 1)

				$query = $query.', ';
		}

		$query = $query.' '.$queryEnd;

		echo $query;

		if($res = $this->db->query($query)){

			echo '<br/><br/>Query executed successfully.';
			redirect('sponscont/showprofile/'.$companyid);

		}

		else

			echo '<br/><br/>Query not executed successfully.';

		$this->session->unset_userdata('temp_cid');

	}

}

?>