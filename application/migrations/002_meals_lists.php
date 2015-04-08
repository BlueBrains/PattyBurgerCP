<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_meals_lists extends CI_Migration{
	public function up(){
	    
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'lists_name' => array(
				'type'=>'varchar',
				'constraint'=>255,
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('lists',TRUE);
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'list_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'meal_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'meal_price'=>array(
				'type'=>'varchar',
				'constraint'=>25,
				'default'=>'unknown'
			),
			'meal_discount'=>array(
				'type'=>'varchar',
				'constraint'=>25,
				'default'=>'unknown'
			),
			'meal_description'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('meal',TRUE);
	
	$this->dbforge->add_field(array(
			'list_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'res_id'=>array(
				'type'=>'int',
				'constraint'=>11
			)
	)); 	  
		$this->dbforge->create_table('list_res',TRUE);
}


	public function down(){
		$this->dbforge->drop_table('lists');
		$this->dbforge->drop_table('meal');
		$this->dbforge->drop_table('list_res');
	}

}