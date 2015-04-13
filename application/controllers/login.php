<?php
require(APPPATH.'libraries/rest_controller.php');
class rest_admin extends REST_Controller {
		function __construct() {
		parent::__construct();
		$this->load->library('session');
		if()
			redirect('rest_admin');
		else if()	
			redirect('manager');
		 
		}
	
		function index_get()
		{
			
		}
		
		function login_get()
		{
			redirect('login');
		}
		
		function login_post()
		{
			
			
			$sess_data=array(
					'logged_in'=>1,
					'is_admin'=>0,
					'user_id'=>$this->login_model->get_supp_id($x[0]->user_id),
					'user_name'=>$this->login_model->get_supp_name($x[0]->user_id),
					);
			$sess_data=array(
					'logged_in'=>1,
					'is_admin'=>0,
					'user_id'=>$this->login_model->get_supp_id($x[0]->user_id),
					'user_name'=>$this->login_model->get_supp_name($x[0]->user_id),
					);		
				$this->session->set_userdata($sess_data);
		}
	
}