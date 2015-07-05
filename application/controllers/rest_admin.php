<?php
require(APPPATH.'libraries/rest_controller.php');
class rest_admin extends REST_Controller {
		function __construct() {
		parent::__construct();
		$this->load->library('session');
		
		if($this->ion_auth->logged_in()){
			$this->load->library('pagination');
			$this->load->model('branch_model');
			 header('Content-Type: text/html; charset=utf-8');
		 }
		 else
		  {
			redirect('auth/logout');
		  }
	}
	
	function index_get()
	{
			$data['record'] =$this->branch_model->get_myres($this->session->userdata('res_id'));
			$data['main_content'] = 'edit_branches';	
			$this->load->view('includes/template',$data);
	}
	
	function all_branches_get()
	{
		$data['record'] =$this->branch_model->get_myres($this->session->userdata('res_id'));
		$data['main_content'] = 'edit_branches';	
		$this->load->view('includes/template',$data);
	}
	
	function add_branches_get()
	{
		if($this->session->userdata('res_id')==$this->get('id')){
		$data['main_content'] = 'add_NewBranch';	
		$this->load->view('includes/template',$data);}
		else
			redirect('auth/logout');
	}
	
	function add_branches_post()
	{
			$this->branch_model->add_new_branch($this->session->userdata('res_id'));
			redirect('rest_admin/add_branches/id/'.$this->session->userdata('res_id'));
	}
	
	function edit_meals_get()
	{

		$data['record'] =$this->branch_model->get_lists();
		$data['record1']=$this->branch_model->get_mlists($this->session->userdata('res_id'));
		$data['main_content'] = 'edit_meals';	
		$this->load->view('includes/template',$data);

	}
	
	function edit_meals_post()
	{
		
		if($this->branch_model->add_meal($this->session->userdata('res_id'))){
			$data['note']="you've add new meal successfully";
			$data['class']="success";
			}
		else
			{
				$data['note']="Sorry there is some mistake try again later";
				$data['class']="warning";
			}	
		$data['record'] =$this->branch_model->get_lists();
		$data['record1']=$this->branch_model->get_mlists($this->get('id'));
		$data['main_content'] = 'edit_meals';	
		$this->load->view('includes/template',$data);
		
	}
	
	function delete_res_branch_get()
	{
		
		$this->branch_model->delete_branch($this->get('bid'));
		redirect('rest_admin/add_branches/id/'.$this->session->userdata('res_id'));
	}
	
	function view_details_get()
	{
		if($this->session->userdata('res_id')==$this->get('id')){
		$data['record']=$this->branch_model->get_branch($this->get('bid'),$this->session->userdata('res_id'));
		$this->load->view('ajaxBranchViewer',$data);
		}
		else
			redirect('auth/logout');
	}
	
	function add_res_get()
	{
		if($this->ion_auth->logged_in() && $this->session->userdata('res_id')==0)
			{
				$this->load-view('addres');
			}
		else 
			redirect('rest_admin');
			
	}
	
	function update_branches_post()
	{

		if($this->branch_model->update_branch($_POST['br_id'])){
		$data['record'] =$this->branch_model->get_myres($this->session->userdata('res_id'));
			$data['note']="your editions have been saved";
			$data['class']="success";
			}
		else
			{
				$data['note']="Sorry there is some mistake try again later";
				$data['class']="warning";
			}	
		$data['main_content'] = 'edit_branches';	
		$this->load->view('includes/template',$data);
	}
	
	function add_list_post()
	{
		$this->branch_model->add_list();
		redirect('rest_admin/edit_meals/id/'.$this->session->userdata('res_id'));
	}
	
	function edit_list_post()
	{
		
			redirect('rest_admin/edit_list/id/'.$this->session->userdata('res_id').'/list_type/'.$_POST['list_type']);
	}
	
	function edit_list_get()
	{

		
		$data['note']=$this->session->flashdata('note');		
		$data['class']=$this->session->flashdata('class');
		$d=$this->get('list_type');
		if($d != 0)
			$data['record']=$this->branch_model->get_specific_lists($this->get('list_type'));
		else 
			{
				$num=$this->branch_model->get_random_lists($this->session->userdata('res_id'));
				if($num >= 0)
					$data['record']=$this->branch_model->get_specific_lists($num);
				$data['num']=$num;
			}
		
		$data['record1']=$this->branch_model->get_mlists($this->session->userdata('res_id'));	
		$data['main_content'] = 'edit_list';
		$this->load->view('includes/template',$data);
	}
	
	function view_meal_details_get()
	{

		$data['record']=$this->branch_model->get_meals($this->get('mid'));
		$data['record1']=$this->branch_model->get_mlists($this->session->userdata('res_id'));
		$data['p']	=$this->get('p');
		$data['list_type']	=$this->get('list_type');
		$this->load->view('ajaxMealViewer',$data);
	}
	
	function delete_meal_get()
	{

		$this->branch_model->delete_meal($this->get('mid'));
		
		redirect('rest_admin/edit_list/id/'.$this->session->userdata('res_id').'/list_type/'.$this->get('list_type').'/'.$this->get('p'));
	}
	
	function update_meal_post()
	{
		if($this->branch_model->update_meal($_POST['meal_id'])){
			$this->session->set_flashdata('note',"your editions have been saved");
			$this->session->set_flashdata('class',"success");
			}
		else
			{
				$this->session->set_flashdata('note',"Sorry there is some mistake try again later");
				$this->session->set_flashdata('class',"warning");
			}
		
			redirect('rest_admin/edit_list/id/'.$this->session->userdata('res_id').'/list_type/'.$_POST['list_type'].'/'.$_POST['p']);

	}
	
	function view_searched_meal_get()
	{
		
		$dirty_url=str_replace(" ","-",$this->get('mid'));
		$clean_url=htmlspecialchars($dirty_url, ENT_QUOTES);
		
		$deco_clean_url= urldecode($clean_url);
			if (isset($deco_clean_url) && (strlen($deco_clean_url)>2)){
					$temp=$this->branch_model->get_searched_meals($deco_clean_url,$this->get('list_type'));
					$data['num']=$temp['num'];
					$data['record']=$temp['meal'];
					$data['record1']=$this->branch_model->get_mlists($this->session->userdata('res_id'));
					$data['p']	=$this->get('p');
					$data['list_type']	=$this->get('list_type');
					$data['result']=$deco_clean_url;
					$data['id']	=$this->session->userdata('res_id');
					if($temp['num']>=1)
						$this->load->view('ajaxMealViewer',$data);
					else if($temp['num']<1)
						{$data['search']=$deco_clean_url; $this->load->view('notfound',$data);}
						//redirect('rest_admin/searched_res/id/'.$this->get('id').'/list_type/'.$this->get('list_type').'/'.$clean_url);
						}
			else 
				$this->load->view('notfound');
	}
	
	function searched_res_get()
	{	
		$deco_clean_url= urldecode($this->get('mid'));
			if (isset($deco_clean_url) && (strlen($deco_clean_url)>2)){
					$temp=$this->branch_model->get_searched_meals($deco_clean_url,$this->get('list_type'));
					$data['search']=$deco_clean_url;
					$data['record1']=$this->branch_model->get_mlists($this->session->userdata('res_id'));
					$data['record']=$temp['meal'];
					$data['main_content'] = 'searched_meals';	
					$this->load->view('includes/template',$data);
			}
	}
	
	function edit_meals_lists_get()
	{
		    $data['record1']=$this->branch_model->get_mlists($this->get('id'));
			$data['main_content'] = 'edit_meals_lists';	
			$this->load->view('includes/template',$data);
	}
	
	function searching_for_meal_get()
	{
		    $data['record1']=$this->branch_model->get_mlists($this->get('id'));
			$data['main_content'] = 'search_for_meal';	
			$this->load->view('includes/template',$data);
	}
	
	function delete_list_get()
	{

		$this->branch_model->delete_list($this->get('list_id'));
		redirect('rest_admin/edit_meals_lists/id/'.$this->session->userdata('res_id'));
	}
	
	function map_get()
	{
		    $temp=$this->branch_model->get_details();
			$data['type']=$temp['type'];
			$data['name']=$temp['name'];
			$data['record']=$this->branch_model->get_map_position($this->session->userdata('res_id'));
			$data['main_content'] = 'add_to_map';
			$this->load->view('includes/template',$data);
	}
	
	function add_map_get()
	{
		$this->branch_model->add_map_position($this->session->userdata('res_id'));
		redirect('rest_admin/map');
	}
}