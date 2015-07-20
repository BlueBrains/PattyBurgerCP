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

	function order($res_id,$user_id,$order)
	{
		$sql=$this->db->query("SELECT * FROM meal where meal.ID = '".$id_meal."'");
		foreach ($sql->result() as $raw ) {
			$data[]=$raw;
		}
		$re['meal']=$data;
		if ($sql->num_rows > 0){ 
			 return $re; 
		}
		else {
			$f=FALSE;	
			return $f;
		}		
	}
}
?>