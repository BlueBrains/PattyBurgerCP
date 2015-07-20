<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_spec extends CI_Migration {

	public function up(){
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
			),
			'description'=>array(
				'type'=>'text',
			),
			'type'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'on/off'
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('spec',TRUE);
//=================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'meal_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'spec_id' => array(
				'type'=>'int',
				'constraint'=>11,
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('spec_meal',TRUE);
//=================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'meals_order_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'spec_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'value' => array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'false'
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('orders_meals_spec',TRUE);		
	}

	public function down()
	{
		$this->dbforge->drop_table('spec');
		$this->dbforge->drop_table('spec_meal');
		$this->dbforge->drop_table('orders_meals_spec');
	}
}