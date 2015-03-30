<?php
require(APPPATH.'libraries/rest_controller.php');
class res extends REST_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('api_model');
		 header('Content-Type: text/html; charset=utf-8');
	}
	
	function index_get()
	{
		
	}
	
	function add_get()
	{
	for($i=0;$i<15;$i++){
		$new_insert_data = array(
			'res_name'=> "koko".$i,
			'user_id'=>$i,
			'res_address'=>"address".$i,
			'type_id'=>2,
			);				
			
			$insert = $this->db->insert('restaurant', $new_insert_data);
			}
	}
	
	function get_res_get()
	{
		
		//$this->response($this->api_model->res());
		 $data = $this->api_model->res();
		 echo json_encode($data);
		 $this->response($data,200);
		// echo json_encode($data);
		 /*$r['res']=urldecode(stripslashes($r['res']));
        $this->response($r);
		//$data=$this->api_model->view_res($this->get('id'));
		/*$data=$this->api_model->res();
		if($this->response->format == 'html'){
		 echo "html";
		}
		else 
		  //$this->response($data,200);
		  echo json_encode($data);*/
		  
	}
}