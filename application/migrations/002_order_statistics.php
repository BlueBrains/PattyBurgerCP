<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_order_statistics extends CI_Migration{
	public function up(){
	    
		$this->dbforge->add_field(array(
			'cust_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'res_meal_id' => array(
				'type'=>'int',
				'constraint'=>11,
			)
	)); 	  
		$this->dbforge->create_table('likes',TRUE);
	
	$this->dbforge->add_field(array(
			'cust_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'res_meal_id' => array(
				'type'=>'int',
				'constraint'=>11,
			)
	)); 	  
		$this->dbforge->create_table('comments',TRUE);
	
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cust_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'branch_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'delivery' => array(
				'type'=>'boolean',
			),
			'delivery_boy_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'Order_time'=>array(
				'type'=>'TIMESTAMP', 
			),
			'bill_value'=>array(
				'type'=>'double'
			),
			'order_status'=>array(
				'type'=>'tinyint',
				'constraint'=>5,
				'default'=>0
			),
			'expected_finish_time'=>array(
				'type'=>'TIMESTAMP',
			)
	)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('orders',TRUE);
	
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'orders_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'res_meal_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('meals_order',TRUE);

	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'month' => array(
				'type'=>'TIMESTAMP', 
			),
			'deleted_order'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'accepted_order'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'delivered_order'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'total_profits'=>array(
				'type'=>'Double',
			)
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('branch_monthly_statistics',TRUE);
		
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'Categories_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Max_Order_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Max_number'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Max_Meal_profits'=>array(
				'type'=>'Double',
			),
			'Min_Order_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Min_number'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Min_Meal_profits'=>array(
				'type'=>'Double',
			)
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('categories_statistiscs',TRUE);

}


	public function down(){
		$this->dbforge->drop_table('likes');
		$this->dbforge->drop_table('comments');
		$this->dbforge->drop_table('orders');
		$this->dbforge->drop_table('meals_order');
		$this->dbforge->drop_table('branch_monthly_statistics');
		$this->dbforge->drop_table('categories_statistiscs');
	}

}