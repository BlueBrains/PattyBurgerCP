<?php
require(APPPATH.'libraries/rest_controller.php');
class manager extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		 header('Content-Type: text/html; charset=utf-8');
		 
		 if($this->session->userdata('logged_in')&&($this->session->userdata('role')==1)){
			$this->load->library('pagination');
			$this->load->model('manager_model');
		 }
		 else
			redirect("auth");
	}
	
	function index_get()
	{
			$data['record']=$this->manager_model->get_types();
			$data['main_content'] = 'homepage';	
			$this->load->view('includes/template',$data);
	}
	
	function signup_get()
	{
			$data['record']=$this->manager_model->get_types();
		    $data['main_content'] = 'homepage';	
			$this->load->view('includes/template',$data);
	}
	
	function signup_post()
	{
			$this->manager_model->signup();
			redirect('manager/index');
	}

	function edit_resturants_get()
	{
		$data['record']=$this->manager_model->get_res();
		$data['main_content'] = 'edit_resturants';	
		$this->load->view('includes/template',$data);
	}
	
	function delete_res_get()
	{
		$this->manager_model->delete_res($this->get('id'));
		redirect('manager/edit_resturants');
	}
	
	function view_details_get()
	{
		$x=$this->manager_model->view_res($this->get('id'));
		$data['record']=$x[1];
		$data['branches']=$x[2];
		$data['number']=$x[3];
		$this->load->view('one_res',$data);
	}
	
	function active_get()
	{
		$this->manager_model->active($this->get('id'));
		redirect('manager/edit_resturants');
	}
	
	function de_active_get()
	{
		$this->manager_model->de_active($this->get('id'));
		redirect('manager/edit_resturants');
	}
	
	function edit_types_get()
	{
		$data['record'] = $this->manager_model->get_types();
		$data['main_content'] = 'edit_types';	
		$this->load->view('includes/template',$data);
	}
	
	function add_type_post()
	{
		$this->manager_model->add_type();
		redirect('manager/edit_types');
	}
	
	function get_type_get()
	{
		$data['record'] =$this->manager_model->get_type($this->get('id'));
		$this->load->view('one_type',$data);
	}
	
	function update_type_post()
	{
		$this->manager_model->update_type($this->input->post('id'));
		redirect('manager/edit_types');
	}
	
	function delete_type_get()
	{
		$this->manager_model->delete_type($this->get('id'));
		redirect('manager/edit_types');
	}
	
	function edit_groups_get()
	{
		$data['record'] = $this->manager_model->get_groups();
		$data['main_content'] = 'edit_groups';	
		$this->load->view('includes/template',$data);
	}
	
	function add_group_post()
	{
		$this->manager_model->add_group();
		redirect('manager/edit_groups');
	}
	
	function get_group_get()
	{
		$data['record'] =$this->manager_model->get_group($this->get('id'));
		$this->load->view('one_group',$data);
	}
	
	function update_group_post()
	{
		$this->manager_model->update_group($this->input->post('id'));
		redirect('manager/edit_groups');
	}
	
	function delete_group_get()
	{
		$this->manager_model->delete_group($this->get('id'));
		redirect('manager/edit_groups');
	}
}