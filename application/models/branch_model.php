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
		$new_insert_data = array(
			'name'=> $this->input->post('listname'),
			'description'=> $this->input->post('description')
			);				
			$insert = $this->db->insert('meals_category', $new_insert_data);

			
	}
	
	function add_meal()
	{
		$this->db->trans_begin();

		$new_insert_data = array(
			'list_id'=> $this->input->post('meal_list'),
			'name'=>  $this->input->post('meal_name'),
			'price'=>  $this->input->post('meal_price'),
			'discount'=>  $this->input->post('meal_discount'),
			'description'=>  $this->input->post('meal_description')
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
		$sql=$this->db->query("SELECT * FROM branch where restaurant_id='".$id."'");
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
		$sql=$this->db->query("SELECT * FROM meals_category");
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
		$sql=$this->db->query("SELECT * FROM meals_category ");
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
	
	function add_new_branch()
	{
		$new_insert_data = array(
			'restaurant_id'=> $this->session->userdata('res_id'),
			'address'=>  $this->input->post('res_add'),
			'phone_nbr_1'=>  $this->input->post('phone1'),
			'phone_nbr_2'=>  $this->input->post('phone2'),
			'phone_nbr_3'=>  $this->input->post('phone3'),
			'deliverable'=>  $this->input->post('delivered'),
			'accept'=> 1,
			'lat'=>$this->input->post('lat'),
			'lng'=>$this->input->post('lng')
			);				
			$insert = $this->db->insert('branch', $new_insert_data);
	}
	
	function delete_branch($id)
	{
			$q="DELETE FROM branch WHERE id =?";
			$sql=$this->db->query($q,$id);
	}
	
	function get_branch($id)
	{
		
		$q="SELECT * FROM branch WHERE id=? ";
		$sql=$this->db->query($q,$id);
		
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
		$q="UPDATE branch SET address=? , phone_nbr_1=? , phone_nbr_2=? , phone_nbr_3=? where id=?";
		$sql=$this->db->query($q,array($this->input->post('res_add'),$this->input->post('phone1'),$this->input->post('phone2'),$this->input->post('phone3'),$id));
		
		return true;
	}
	
	function get_specific_lists($id)
	{
				$q="SELECT * FROM res_meal inner join meal on meal.id=res_meal.meal_id where category_id='".$id."' and res_id='".$this->session->userdata('branch_id')."'";
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
		$q="SELECT * FROM meals_category limit 1";
		$sql=$this->db->query($q);
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 return $data[0]->id; 
		}
	}
	
	function get_searched_meals($meal_name,$id)
	{
		$prev_meal_name=$meal_name;
		$meal_name=str_replace(" ","-",$meal_name);
		$meal_name='%'.$meal_name.'%';
		
		$q="SELECT * FROM res_meal inner join meal on res_meal.meal_id=meal.id where name LIKE ? or description LIKE ? and category_id=? and res_meal.res_id=?";
				
				$config['base_url'] = base_url().'rest_admin/searched_res/id/'.$this->session->userdata('res_id').'/list_type/'.$id.'/mid/'.$prev_meal_name;
				
					$limit = 20;
				$offset = ($this->uri->segment(9) != '' ? $this->uri->segment(9):0);
				//echo'<script type="text/javascript">alert('.$offset.');</script>';
				$config['total_rows'] = $this->db->query($q,array($meal_name,$meal_name,$id,$this->session->userdata('branch_id')))->num_rows;
				$config['per_page'] = $limit;
				$config['num_links'] = 25;
				$q .= " limit ".$limit." offset ".$offset;
				$this->pagination->initialize($config);
			
			$sql=$this->db->query($q,array($meal_name,$meal_name,$id,$this->session->userdata('branch_id')));
				
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
	
	function get_details()
	{
		$q="SELECT name,logo FROM restaurant where restaurant.id='".$this->session->userdata('res_id')."'";
		$sql=$this->db->query($q);
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		if ($sql->num_rows > 0)
           { 
			 $temp['name']=$data[0]->name;
			 $temp['logo']=$data[0]->logo;
			 return $temp; 
		}
	}
	
	function worker_number($id){
		$q="SELECT * FROM worker WHERE res_id =? ";
		$sql=$this->db->query($q,$id);
           
			 return $sql->num_rows;
	}
	
	function branch_number($id){
		$q="SELECT * FROM branch WHERE restaurant_id =? ";
		$sql=$this->db->query($q,$id);
           
			 return $sql->num_rows;
		}
	
	function add_worker()
	{
		$q="SELECT * FROM users where email=?";
		$sql=$this->db->query($q,array($this->input->post('email'))); 
		if ($sql->num_rows > 0)
           { return 0;}
		 else {  
		$key = pack('H*', "bcb04b4a8b6a0cffe54763945cef08bc88abe000fdebae5e1d417e2ffb2a12a3");
			
			# show key size use either 16, 24 or 32 byte keys for AES-128, 192
			# and 256 respectively
			
			$plaintext = $this->input->post('password');

			
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
			$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
			
			$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);

			
			$ciphertext = $iv . $ciphertext;
			
			
			$ciphertext_base64 = base64_encode($ciphertext);
		
		
		$npass=$ciphertext_base64;
		
		$new_insert_data = array(
			'email'=>$this->input->post('email'),
			'password'=>$npass,
			'first_name'=> $this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'phone'=>$this->input->post('mobile_num'),
			'gender'=>$this->input->post('gender')
			);				
			
			$insert = $this->db->insert('users', $new_insert_data);
			$k=mysql_insert_id();
			
			$new_insert_data = array(
			'res_id'=>$this->input->post('branch_id'),
			'user_id'=>$k
			);
			
			$insert = $this->db->insert('worker', $new_insert_data);
			
			$new_insert_data = array(
			'user_id'=> $k,
			'group_id'=>$this->input->post('group')
			);	
			$insert = $this->db->insert('users_groups', $new_insert_data);
			}
	}
	
	function get_allworker()
	{
			$q="SELECT *,worker.id as w_id , groups.name as gname FROM branch inner join worker on worker.res_id=branch.id inner join users on users.id=worker.user_id inner join users_groups on users_groups.user_id=users.id inner join groups on groups.id=users_groups.group_id where branch.restaurant_id=?";
				
				$config['base_url'] = base_url().'rest_admin/edit_workers';
				
					$limit = 10;
				$offset = ($this->uri->segment(4) != '' ? $this->uri->segment(4):0);
				//echo'<script type="text/javascript">alert('.$offset.');</script>';
				$config['total_rows'] = $this->db->query($q,array($this->session->userdata('res_id')))->num_rows;
				$config['per_page'] = $limit;
				$config['num_links'] = 25;
				$q .= " limit ".$limit." offset ".$offset;
				$this->pagination->initialize($config);
			
			$sql=$this->db->query($q,array($this->session->userdata('res_id')));
				
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
			
			if ($sql->num_rows > 0)
           { 
			 return $data; 
			}
			else 
				return false;
	}
	
	function view_worker($id)
	{
		$q="SELECT *,worker.id as w_id,users.id as u_id FROM worker inner join users on users.id=worker.user_id inner join users_groups on users_groups.user_id=users.id where worker.id=?";
		$sql=$this->db->query($q,array($id));
				foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
			
			if ($sql->num_rows > 0)
           { 
			 return $data;
			}
			else 
				return false;
	}
	
	function update_worker()
	{
		$q="UPDATE worker SET res_id=? where id=?";
		$sql=$this->db->query($q,array($this->input->post('branch_id'),$this->input->post('w_id')));
		
		$q="UPDATE users_groups SET group_id=? where user_id=?";
		$sql=$this->db->query($q,array($this->input->post('group'),$this->input->post('u_id')));
	
		return true;
	}
	
	function delete_worker($id,$u_id){
		$q="DELETE FROM worker WHERE id =?";
		 $sql=$this->db->query($q,$id);
		$q="DELETE FROM users_groups WHERE user_id =?";
		 $sql=$this->db->query($q,$u_id); 
		$q="DELETE FROM users WHERE id =?";
		 $sql=$this->db->query($q,$u_id);
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