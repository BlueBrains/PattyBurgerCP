<?php

class log_model extends CI_Model {
	
	function is_res($id)
	{
		$q="SELECT * FROM restaurant where user_id=? ";
		$sql=$this->db->query($q,$id); 
		
		foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		
		if ($sql->num_rows > 0)
			return $data[0]->id;
		else 
			return 0;
	}
}