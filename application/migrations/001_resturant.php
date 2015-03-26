<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_resturant extends CI_Migration{
	public function up(){
	    
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'user_id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
			),
			'res_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'res_address'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'res_logo'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'type_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'default'=>1
			),
			'phone1'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone2'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone3'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'accept'=>array(
				'type'=>'boolean',
				'default'=>0
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('restaurant',TRUE);
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'res_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'Branch_Address'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone1'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone2'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone3'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('rest_Branch',TRUE);
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'email'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'password'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('users',TRUE);
	
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('types',TRUE);
		
	}	


	public function down(){
		$this->dbforge->drop_table('restaurant');
		$this->dbforge->drop_table('rest_Branch');
		$this->dbforge->drop_table('users');
	}

}