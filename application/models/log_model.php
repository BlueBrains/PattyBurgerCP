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
	
	function validate()
	{
		$q="SELECT * FROM users inner join users_groups on users_groups.user_id=users.id where email='".$this->input->post('email')."'";
		$sql=$this->db->query($q);
		
		foreach ($sql->result() as $raw ) {
					$data[]=$raw;
				}
		$res[1]=$sql->num_rows;
		if ($sql->num_rows > 0)
			{	
					$key = pack('H*', "bcb04b4a8b6a0cffe54763945cef08bc88abe000fdebae5e1d417e2ffb2a12a3");
					
					$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
					$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
					
					foreach($data as $temp) {
						$ciphertext_base64=$temp->password;
						$grp_id=$temp->group_id;
						$user_id=$temp->id;
					}
					
					$ciphertext_dec = base64_decode($ciphertext_base64);
			
					# retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
					$iv_dec = substr($ciphertext_dec, 0, $iv_size);
					
					# retrieves the cipher text (everything except the $iv_size in the front)
					$ciphertext_dec = substr($ciphertext_dec, $iv_size);

					# may remove 00h valued characters from end of plain text
					$ans = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
					
					$final      = trim($ans, "\0..\32");

				if($this->input->post('password')==$final){
				
				   if($grp_id>2){
					$q0="SELECT res_id ,restaurant_id FROM worker inner join branch on branch.id=worker.res_id where user_id=?";
					$sql0=$this->db->query($q0,array($user_id));
					foreach ($sql0->result() as $raw ) {
								$data0[]=$raw;
							}
							$res[4]=$data0;	
					}
					
					else if($grp_id==2){
					$q5="SELECT id as k FROM restaurant where owner_id='".$user_id."'";
					$sql5=$this->db->query($q5);
					foreach ($sql5->result() as $raw ) {
								$dato[]=$raw;
							}
							$res[4]=$dato;	
					}
					
					$res[3]=$grp_id;
					$res[2]=$data;
					return $res;
					}
				else{
						$res[1]=0;
						return $res;
					}
			}
		else 
			return $res;
	}
	
}