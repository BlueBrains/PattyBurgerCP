<?php

class branch_model extends CI_Model {
	
	function get_meals($id)
	{
		$sql=$this->db->query("SELECT * FROM meal where id='".$id."'");
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
	
	function delete_meal($id)
	{
		/*$q="DELETE FROM meal WHERE id =? and res_id=?";
			$sql=$this->db->query($q,array($id,$this->session->userdata('res_id')));*/
		$q="DELETE FROM meal WHERE id =?";
			$sql=$this->db->query($q,$id);	
	}
	
	function update_meal($id)
	{
		$this->db->trans_begin();
		$q="UPDATE meal SET meal_name=? , meal_price=? , meal_discount=? , list_id=? , meal_description=? , meal_img=? where id=?";
		
		$file_name=$this->input->post('meal_image');
		if(!empty($_FILES['fic']['name'])){
					
					$ext=explode(".",strtolower($_FILES['fic']['name']));
		 			$extension=array_pop($ext);
		            $file_name =$id.".".$extension;
					
				    $file_size =$_FILES['fic']['size'];
				    $file_tmp =$_FILES['fic']['tmp_name'];
				    $file_type=$_FILES['fic']['type'];
					
					$location=realpath($_SERVER['DOCUMENT_ROOT'])."\\burger_ownercp\\uploads\\res".$this->session->userdata('res_id')."\\mealimg\\".$file_name;
	        	 	move_uploaded_file($file_tmp, $location);
					$d = $this->compress($location, $location, 30);
					
		}
		$sql=$this->db->query($q,array($this->input->post('meal_name'),$this->input->post('meal_price'),$this->input->post('meal_discount'),$this->input->post('meal_list'),$this->input->post('meal_description'),$file_name,$id));
		if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
						return false;
					 }
					 else
					 {
						$this->db->trans_commit();
						return true;
					 }		
	}
	
	function add_list()
	{
		$this->db->trans_begin();
		$new_insert_data = array(
			'lists_name'=> $this->input->post('listname')
			);				
			$insert = $this->db->insert('lists', $new_insert_data);
			$r=mysql_insert_id();
		$new_insert_data1 = array(
			'list_id'=> $r,
			'res_id'=> $this->session->userdata('res_id')
			
			);				
			$insert = $this->db->insert('list_res', $new_insert_data1);
			
			
		if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
					 }
					 else
					 {
						$this->db->trans_commit();
					 }		
			
	}
	
	function add_meal()
	{
		$this->db->trans_begin();

		$new_insert_data = array(
			'list_id'=> $this->input->post('meal_list'),
			'meal_name'=>  $this->input->post('meal_name'),
			'meal_price'=>  $this->input->post('meal_price'),
			'meal_discount'=>  $this->input->post('meal_discount'),
			'meal_description'=>  $this->input->post('meal_description')
			);				
			$insert = $this->db->insert('meal', $new_insert_data);
			$r=mysql_insert_id();
		if(!empty($_FILES['fic']['name']))
			{
					$ext=explode(".",strtolower($_FILES['fic']['name']));
		 			$extension=array_pop($ext);
				 	
					$file_name =$r.".".$extension;
					
				    $file_size =$_FILES['fic']['size'];
				    $file_tmp =$_FILES['fic']['tmp_name'];
				    $file_type=$_FILES['fic']['type'];
					$path=getcwd();
					if (!file_exists ($path."\\uploads\\res".$this->session->userdata('res_id')."\\mealimg"))
						mkdir($path."\\uploads\\res".$this->session->userdata('res_id')."\\mealimg",0777,TRUE);
					$location=realpath($_SERVER['DOCUMENT_ROOT'])."\\burger_ownercp\\uploads\\res".$this->session->userdata('res_id')."\\mealimg\\".$file_name;
	        	 	move_uploaded_file($file_tmp, $location);
					$d = $this->compress($location, $location, 30);
					
					$q="UPDATE meal SET meal_img=? where id='".$r."' ";
		   
		            $sql=$this->db->query($q,$file_name);
			}
		
				$new_insert_data1 = array(
			'list_id'=> $this->input->post('meal_list'),
			'res_id'=> $this->session->userdata('res_id')
			
			);				
			$insert = $this->db->insert('list_res', $new_insert_data1);	
		if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
						return false;
					 }
					 else
					 {
						$this->db->trans_commit();
						return true;
					 }		
	}
	
	function get_myres($id)
	{
		$sql=$this->db->query("SELECT * FROM rest_branch where res_id='".$id."'");
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
	
	function get_mlists($id)
	{
		$sql=$this->db->query("SELECT * FROM lists inner join list_res on list_res.list_id = id where res_id='".$id."'");
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
	
	function add_new_branch($id)
	{
		$new_insert_data = array(
			'res_id'=> $this->session->userdata('res_id'),
			'Branch_Address'=>  $this->input->post('res_add'),
			'phone1'=>  $this->input->post('phone1'),
			'phone2'=>  $this->input->post('phone2'),
			'phone3'=>  $this->input->post('phone3')
			);				
			$insert = $this->db->insert('rest_branch', $new_insert_data);
	}
	
	function delete_branch($id)
	{
			$q="DELETE FROM rest_branch WHERE id =? and res_id=?";
			$sql=$this->db->query($q,$id,$this->session->userdata('res_id'));
	}
	
	function get_branch($bid,$id)
	{
		
		$q="SELECT * FROM rest_branch WHERE res_id =? and id=? ";
		$sql=$this->db->query($q,array($id,$bid));
		
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
	
	function update_branch($id)
	{
		$q="UPDATE rest_branch SET branch_address=? , phone1=? , phone2=? , phone3=? where id=? and res_id=?";
		$sql=$this->db->query($q,array($this->input->post('res_add'),$this->input->post('phone1'),$this->input->post('phone2'),$this->input->post('phone3'),$id,$this->session->userdata('res_id')));
		
		return true;
	}
	
	function get_specific_lists($id)
	{
				$q="SELECT * FROM meal where list_id='".$id."'";
				$config['base_url'] = base_url().'rest_admin/edit_list/id/'.$this->session->userdata('res_id').'/list_type/'.$id;
				
					$limit = 10;
				$offset = ($this->uri->segment(7) != '' ? $this->uri->segment(7):0);
				//echo'<script type="text/javascript">alert('.$offset.');</script>';
				$config['total_rows'] = $this->db->query($q)->num_rows;
				$config['per_page'] = $limit;
				$config['num_links'] = 25;
				$q .= " limit ".$limit." offset ".$offset;
				$this->pagination->initialize($config);
			
			$sql=$this->db->query($q);
				
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
	
	function get_random_lists($id)
	{
		$q="SELECT * FROM list_res where res_id='".$id."' limit 1";
		$sql=$this->db->query($q);
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 return $data[0]->list_id; 
		}
	}
	
	function get_searched_meals($meal_name,$id)
	{
		$prev_meal_name=$meal_name;
		$meal_name=str_replace(" ","-",$meal_name);
		$meal_name='%'.$meal_name.'%';
		
		$q="SELECT * FROM meal where meal_name LIKE ? or meal_description LIKE ? and list_id=?";
				
				$config['base_url'] = base_url().'rest_admin/searched_res/id/'.$this->session->userdata('res_id').'/list_type/'.$id.'/mid/'.$prev_meal_name;
				
					$limit = 20;
				$offset = ($this->uri->segment(9) != '' ? $this->uri->segment(9):0);
				//echo'<script type="text/javascript">alert('.$offset.');</script>';
				$config['total_rows'] = $this->db->query($q,array($meal_name,$meal_name,$id))->num_rows;
				$config['per_page'] = $limit;
				$config['num_links'] = 25;
				$q .= " limit ".$limit." offset ".$offset;
				$this->pagination->initialize($config);
			
			$sql=$this->db->query($q,array($meal_name,$meal_name,$id));
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 	$temp['meal']=$data;
				$temp['num']=$sql->num_rows;
					return $temp; 
		}
		else {
			$temp['meal']=false;
			$temp['num']=$sql->num_rows;
			return $temp;
		}
	}
	
	function delete_list($id)
	{
		/*$this->db->trans_begin();
			$q1="SELECT * FROM meal WHERE list_id =?";
			$sql1=$this->db->query($q1,$id);
			
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;}
					
				foreach ($data as $row ) {	
					$file=realpath($_SERVER["DOCUMENT_ROOT"])."\\burger_ownercp\\upload\\".$this->session->userdata('res_id')."\\".$row['meal_img'];
					unlink($file); // delete file
				}
		*/		
			$q="DELETE FROM meal WHERE list_id =?";
				$sql=$this->db->query($q,$id);
				
			$q="DELETE FROM list_res WHERE list_id =? and res_id=?";
				$sql=$this->db->query($q,$id,$this->session->userdata('res_id'));/*	
		if ($this->db->trans_status() === FALSE)
					 {
						$this->db->trans_rollback();
					 }
					 else
					 {
						$this->db->trans_commit();
					 }		*/
		
	}
	
	function add_map_position($id)
	{
		
	}
	
	function get_map_position($id)
	{
		
	}

	function get_details()
	{
		$q="SELECT res_name,name FROM restaurant inner join types on types.id=type_id where restaurant.id='".$this->session->userdata('res_id')."'";
		$sql=$this->db->query($q);
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 $temp['name']=$data[0]->res_name;
			 $temp['type']=$data[0]->name;
			 return $temp; 
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