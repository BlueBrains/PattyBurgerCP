<?php
require(APPPATH.'libraries/rest_controller.php');
class manager extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('manager_model');
		 header('Content-Type: text/html; charset=utf-8');
	}
	
	function index_get()
	{
			$data['record']=$this->manager_model->get_types();
			$data['main_content'] = 'homepage';	
			$this->load->view('includes/template',$data);
	}
	
	function singup_get()
	{
			$data['record']=$this->manager_model->get_types();
		    $data['main_content'] = 'homepage';	
			$this->load->view('includes/template',$data);
	}
	
	function singup_post()
	{
			$this->manager_model->singup();
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
		$data['record']=$this->manager_model->view_res($this->get('id'));
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
	
	function add_branches_get()
	{
		$data['record'] =$this->manager_model->get_myres($this->get('id'));
		$data['main_content'] = 'edit_branches';	
		$this->load->view('includes/template',$data);
	}
	
	function add_branches_post()
	{
		
	}
	
	function edit_meals_get()
	{
		$data['record'] =$this->manager_model->get_lists();
		$data['record1']=$this->manager_model->get_mlists($this->get('id'));
		$data['main_content'] = 'edit_meals';	
		$this->load->view('includes/template',$data);
	}
	
	function edit_meals_post()
	{
		$this->manager_model->add_list();
		$data['record'] =$this->manager_model->get_lists();
		$data['record1']=$this->manager_model->get_mlists($this->get('id'));
		$data['main_content'] = 'edit_meals';	
		$this->load->view('includes/template',$data);
	}
	
	function add_new_meals_post()
	{
		$this->manager_model->add_meal();
		//redirect('manager/edit_meals/id/1');//session);
	}
	
}