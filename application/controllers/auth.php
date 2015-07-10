<?php
require(APPPATH.'libraries/rest_controller.php');
class auth extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		 header('Content-Type: text/html; charset=utf-8');
			$this->load->model('log_model');
	}
	
	function index_get()
	{
			if($this->session->userdata('logged_in')&&($this->session->userdata('role')==1))
					redirect("manager");
			else if($this->session->userdata('logged_in')&&($this->session->userdata('role')>1))
					redirect("rest_admin");
					
			$this->load->view('login');
	}
	function login_get()
	{
			if($this->session->userdata('logged_in')&&($this->session->userdata('role')==1))
					redirect("manager");
			else if($this->session->userdata('logged_in')&&($this->session->userdata('role')>1))
					redirect("rest_admin");

			$this->load->view('login');
	}
	function login_post()
	{
			$a=$this->log_model->validate();
			if($a[1]==0){
				$data['msg']=1;
				$this->load->view('login',$data);
			}
			else{
				session_start();
				if($a[3]==2)
				$sess_data=array(
					'logged_in'=>1,
					'res_id'=>$a[4][0]->k,
					'name'=>$a[2][0]->first_name." ".$a[2][0]->last_name,
					'role'=>$a[3]
					);
				else if($a[3]>2)
				$sess_data=array(
					'logged_in'=>1,
					'res_id'=>$a[4][0]->restaurant_id,
					'branch_id'=>$a[4][0]->res_id,
					'name'=>$a[2][0]->first_name." ".$a[2][0]->last_name,
					'role'=>$a[3]
					);
				else
					$sess_data=array(
					'logged_in'=>1,
					'res_id'=>0,
					'name'=>$a[2][0]->first_name." ".$a[2][0]->last_name,
					'role'=>$a[3]
					);
				$this->session->set_userdata($sess_data);	
				/*
				echo "<br> res :".$this->session->userdata('res_id');
				echo "<br> name :".$this->session->userdata('name');
				echo "<br> role :".$this->session->userdata('role');
				echo "<br> b_id :".$this->session->userdata('branch_id');*/
				if($a[3]==1)
					redirect("manager");
				else
					redirect("rest_admin");
			}
	}
	function signup_get()
	{
			$this->load->model('manager_model');
			$data['record']=$this->manager_model->get_types();
			$this->load->view('signup',$data);
	}
	
	function signup_post()
	{
			$this->load->model('manager_model');
			$a=$this->manager_model->signup();
			$sess_data=array(
					'logged_in'=>1,
					'res_id'=>$a[1],
					'name'=>$a[0],
					'role'=>2
					);
			redirect('rest_admin/index');
	}
	
	function logout_get()
	{
		$sess_data=array(
					'logged_in'=>0,
					'res_id'=>0,
					'name'=>0,
					'role'=>-1
					);
				$this->session->set_userdata($sess_data);
		session_unset();
		session_destroy();
		
		redirect("auth");
	}
}