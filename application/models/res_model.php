<?php
/**
* 
*/
class Res_model extends CI_Model
{
	
	/*function __construct(argument)
	{
		# code...
	}*/

	function ress()
	{
		$sql=$this->db->query("SELECT b.id,r.name,c.name as category_name,b.address,r.logo,r.rate,r.description,b.deliverable,b.lat,b.lng,b.phone_nbr_1,r.price_range
		 					   FROM restaurant r
		 					   inner join branch b on r.id = b.restaurant_id
		 					   inner join res_category c on r.category_id = c.id
		 					   ORDER BY r.rate DESC, r.name ASC");
		if ($sql->num_rows > 0){ 
			foreach ($sql->result() as $raw ) {
				$data[]=$raw;
			}
			$re['restaurants']=$data;
			return $re; 
		}	
		else {
			$f=FALSE;	
			return $f;
		}
	}


	function get_res_cat_names($id_res){
		$sql=$this->db->query("SELECT DISTINCT mc.name as restaurantMeals_cat_name
							   FROM res_meal rm 
							   INNER JOIN branch b on rm.res_id  = b.id
							   INNER JOIN meal m on rm.meal_id  = m.id
							   INNER JOIN meals_category mc on m.category_id  = mc.id
							   WHERE rm.res_id = '".$id_res."'");
		return $sql;		
	}

	function res($id_res)
	{	
		$sql = $this->get_res_cat_names($id_res);
		if ($sql->num_rows > 0){ 
			foreach ($sql->result() as $raw ) {
				$data[]=$raw;
			}
			$re['tab_count']=$sql->num_rows;
			$re['tab_names']=$data;
			return $re; 
		}
		else {
			$f=FALSE;	
			return $f;
		}		
	}

	function res_tab_meal($id_res,$id_tab)
	{
		$sql = $this->get_res_cat_names($id_res);
		foreach ($sql->result() as $raw ) {
			$tabs[]=$raw;
		}
		$tab = $tabs[$id_tab-1]->restaurantMeals_cat_name;
		$sql=$this->db->query("SELECT m.name as name,rm.details as details,rm.price as price, rm.rate as rating,rm.preparing_time as preparing_time, rm.image as image
							   FROM res_meal rm 
							   INNER JOIN branch b on rm.res_id  = b.id
							   INNER JOIN meal m on rm.meal_id  = m.id
							   INNER JOIN meals_category mc on m.category_id  = mc.id
							   WHERE mc.name = '".$tab."' AND rm.res_id = '".$id_res."'");
		if ($sql->num_rows > 0){ 
			foreach ($sql->result() as $raw ) {
				$data[]=$raw;
			}
			$re['meals']=$data;
			 return $re; 
		}
		else {
			$f=FALSE;	
			return $f;
		}
	}

	function get_last_orderId(){
		$sql=$this->db->query("SELECT id as lastId FROM orders ORDER BY id DESC LIMIT 1;"); //temporary solution beacaue of high cost ! 
		if ($sql->num_rows > 0){
			return $sql->row()->lastId;
		}
		else{
			return 0;
		}
	}

	function get_last_meals_orderId(){
		$sql=$this->db->query("SELECT id as lastId FROM meals_order ORDER BY id DESC LIMIT 1;"); //temporary solution beacaue of high cost ! 
		if ($sql->num_rows > 0){
			return $sql->row()->lastId;
		}
		else{
			return 0;
		}
	}


	function insert_order($user_id,$res_id,$order)
	{
		//sample.1. [{"res_meal":1,"spec":[{"id":1,"value":0},{"id":10,"value":1}]},{"res_meal":2,"spec":[{"id":1,"value":0}]}]		
		//sample.2. [{"res_meal":1,"spec":[{"id":1,"value":0},{"id":10,"value":1}]},{"res_meal":2}]
		$order_id = $this->get_last_orderId() + 1;
		$sql=$this->db->query("INSERT INTO orders (cust_id,branch_id)
							   VALUES ('".$user_id."','".$res_id."')");
		$result = json_decode($order);
		foreach ($result as $meal){
			$sql=$this->db->query("INSERT INTO meals_order (orders_id,res_meal_id)
								   VALUES ('".$order_id."','".$meal->res_meal."')");
			//if there is no spec json will have no spec key like [{"res_meal":1},{"res_meal":2}]
			if (isset($meal->spec)){
				$meal_order_id = $this->get_last_meals_orderId();
				foreach ($meal->spec as $spec){
					$sql=$this->db->query("INSERT INTO orders_meals_spec(meals_order_id,spec_id,value)
								   		   VALUES ('".$meal_order_id."','".$spec->id."','".$spec->value."')");
				}
			}
		}
	}

}
?>