<?php
require(APPPATH.'libraries/rest_controller.php');
class res extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('album_model');
		$this->load->model('site_model');
		$this->load->library('session');
		$this->load->model('coral_model');
		$this->load->library('pagination');
		$this->load->model('manager_model');
		 header('Content-Type: text/html; charset=utf-8');
	}
	
	function add_user()
	{
		$this->manager_model->add_user();
		redirect('site/manager');
	}
	
	function update_user()
	{
		$this->manager_model->update_user($_POST['hid']);
		redirect('site/manager');
	}
	
	function get_user()
	{
		
		$content=$this->input->post('type');
		$id=$this->input->post('id');

		$this->coral_model->save_change($content,$id);
		$info=$this->manager_model->get_user($_POST['admins_name']);
		$data['user_name']=$info[0]->user_name;
		$data['user_pass']=$info[0]->password;
		$data['user_id']=$info[0]->id;
		$data['user_pre']=$this->manager_model->get_user_pre($_POST['admins_name']);
		$data['main_content']='edit_manager';
		$data['side_bar_news']=$this->coral_model->get_news();
		$this->load->view('includes/template',$data);
	}
	
	function delete_user($id){
		$this->manager_model->delete_user($id);
		redirect('site/manager');
	}
	
}