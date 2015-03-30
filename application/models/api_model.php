<?php

class api_model extends CI_Model {
	
	
	function res()
	{
		$sql=$this->db->query("SELECT res_name,res_address  FROM restaurant ");
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
				$re['restaurant']=$data;
		if ($sql->num_rows > 0)
           { 
			 return $re; 
		}	
	}
	
	function view_res($id)
	{
		$sql=$this->db->query("SELECT res_name,res_address FROM restaurant WHERE restaurant.id = '".$id."'");
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 return $data; 
		}
		else {
			$f=FALSE;	
			return $f;
		}		
	}
}