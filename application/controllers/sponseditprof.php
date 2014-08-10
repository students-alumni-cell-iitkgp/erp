<?php

class sponseditprof extends CI_Controller{

	public $cid;

	public function __construct(){

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('session');

		$this->load->model('sponseditmodel');

		$this->load->model('sponsmodel');

		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->cid = 0;


	}

	public function editnow($companyid){

		if($this->sponsmodel->checkAllotment($companyid)){

			echo $this->load->view('templates/headerspons.html', array(), TRUE);

			echo '<h2>This Sponsor has not been allotted to you.<br/><h2>';

			$url = site_url('sponscont/');

			echo "<h4><a href='$url'>Go back to Summary Page</a><h4>";

			echo $this->load->view('templates/footer.html', array(), TRUE);

			die;
		}

		$this->session->set_userdata('temp_cid', $companyid); // additional userdata that will be temporarily
															// for this function. once used in the model, it will 
															// unset.

		$this->load->view('templates/headerspons.html');
		$this->load->view('sponsorship/editprof.php', $this->sponseditmodel->getFields($companyid));
		$this->load->view('templates/footer.html');

	}

	public function editprofile(){

		$cid = $this->session->userdata('temp_cid');

		echo 'The submitted function has been called. We will now talk with the model.<br/>';
		echo 'Query executed against Company ID '.$cid.'<br/>';


		$this->sponseditmodel->updateRecord($this->sponseditmodel->getFields(1), $cid);

	}

}


?>