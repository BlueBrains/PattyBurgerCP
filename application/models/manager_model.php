<?php

class manager_model extends CI_Model {
	
	function singup()
	{
		$q="SELECT * FROM users where email=?";
		$sql=$this->db->query($q,array($this->input->post('email'))); 
		if ($sql->num_rows > 0)
           { return 0;}
		else {
		$this->db->trans_begin();
		$new_insert_data = array(
			'username'=> $this->input->post('username'),
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password')
			);				
			$insert = $this->db->insert('users', $new_insert_data);
			$r=mysql_insert_id();
					
			if(!empty($_FILES['fic']['name']))
			{
					$ext=explode(".",strtolower($_FILES['fic']['name']));
		 			$extension=array_pop($ext);
				 	$file_name =$r.".".$extension;
				
				    $file_size =$_FILES['fic']['size'];
				    $file_tmp =$_FILES['fic']['tmp_name'];
				    $file_type=$_FILES['fic']['type'];
					$location=realpath($_SERVER['DOCUMENT_ROOT'])."\\burger_ownercp\\upload\\".$file_name;
	        	 	move_uploaded_file($file_tmp, $location);
					$d = $this->compress($location, $location, 30);

			}
			else{
				$file_name='default.jpg';
			}
			
			$new_insert_data = array(
			'res_name'=> $this->input->post('res_name'),
			'user_id'=>$r,
			'res_address'=>$this->input->post('res_address'),
			'type_id'=>$this->input->post('type_id'),
			'phone1'=>$this->input->post('phone1'),
			'phone2'=>$this->input->post('phone2'),
			'phone3'=>$this->input->post('phone3'),
			'res_logo'=>$file_name
			);				
			
			$insert = $this->db->insert('restaurant', $new_insert_data);
			
			
		if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
					 }
					 else
					 {
						$this->db->trans_commit();
					 }	
		}			 
	}
		
	function delete_res($id)
	{
			$this->db->trans_begin();
				$sql=$this->db->query("SELECT * FROM restaurant WHERE id = '".$id."'");
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
				$this->db->query("DELETE FROM restaurant WHERE id = '".$id."'");
				$files = glob(realpath($_SERVER['DOCUMENT_ROOT'])."\\burger_ownercp\\upload\\*"); // get all file names
				foreach($files as $file){ // iterate files
				  if(is_file($file) && ($file == realpath($_SERVER["DOCUMENT_ROOT"])."\\burger_ownercp\\upload\\".$data[0]->res_logo))
				  
					unlink($file); // delete file
				}
				
				
				
			if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
					 }
					 else
					 {
						$this->db->trans_commit();
					 }	
	}	
	
	function get_res()
	{
		$sql=$this->db->query("SELECT * FROM restaurant ");
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
	
	function view_res($id)
	{
		$sql=$this->db->query("SELECT * FROM restaurant inner join types on types.id = restaurant.type_id inner join users on users.id=user_id WHERE restaurant.id = '".$id."'");
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
	

	
	function active($id)
	{
		$q="UPDATE restaurant SET 
		   accept =1 where id=? ";
		   
		$sql=$this->db->query($q,$id);
	}
	
	function de_active($id)
	{
			$q="UPDATE restaurant SET 
		   accept =0 where id=? ";
		   
		$sql=$this->db->query($q,$id);
	}
	
	function get_types()
	{
		$sql=$this->db->query("SELECT * FROM types");
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
	
	function add_type()
	{
		$new_insert_data = array(
			'name'=> $this->input->post('name')
			);				
			$insert = $this->db->insert('types', $new_insert_data);
	}
	
	function get_type($id)
	{
		$sql=$this->db->query("SELECT * FROM types where id='".$id."'");
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
	
	function update_type($id)
	{
		$q="UPDATE types SET name=? where id='".$id."' ";
		   
		$sql=$this->db->query($q,$this->input->post('name'));
	}
	
	function delete_type($id)
	{
		$this->db->query("DELETE FROM types WHERE id = '".$id."'");
	}

	function get_lists()
	{
		$sql=$this->db->query("SELECT * FROM lists");
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
	
	function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}
}