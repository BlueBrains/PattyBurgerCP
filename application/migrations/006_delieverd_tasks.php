<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_delieverd_tasks extends CI_Migration{
	public function up(){

	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'delivery_boy_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'xml_road'=>array(
				'type'=>'varchar',
				'constraint'=>11
			),
			'orders_num'=>array(
				'type'=>'int',
				'constraint'=>5,
				'default'=>1
			),
			'del_time'=>array(
				'type'=>'TIMESTAMP',
			),
			'established_time'=>array(
				'type'=>'TIMESTAMP',
			),
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('delieverd_tasks',TRUE);

}


	public function down(){
		$this->dbforge->drop_table('delieverd_tasks');
	}

}