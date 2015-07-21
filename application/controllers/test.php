<?php
/**
* 
*/
class test extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('res_model');
	}

	function index()
	{	
		$data['a'] = $this->res_model->res_tab_meal(1,0);
		$this->load->view('test',$data);
	}
}
?>
