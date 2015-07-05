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
			'res_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'delivered' => array(
				'type'=>'boolean',
				'default'=>'true'
			),
			'delivery_boy_id' => array(
				'type'=>'int',
				'constraint'=>11
			),
			'Order_time'=>array(
				'type'=>'TIMESTAMP', 
				'constraint'=>"NOT NULL",
				'default'=>'CURRENT_TIMESTAMP'
			),
			'bill_value'=>array(
				'type'=>'double',
				'constraint'=>25,
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
			'customize_meal_id'=>array(
				'type'=>'int',
				'constraint'=>11
			)
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
				'constraint'=>"NOT NULL",
				'default'=>'CURRENT_TIMESTAMP'
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
				'constraint'=>20
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
			'Max_Meal_Order_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Max_Meal_Order_number'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Max_Meal_Order_profits'=>array(
				'type'=>'Double',
				'constraint'=>20
			),
			'Min_Meal_Order_id'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Min_Meal_Order_number'=>array(
				'type'=>'int',
				'constraint'=>11
			),
			'Min_Meal_Order_profits'=>array(
				'type'=>'Double',
				'constraint'=>20
			)
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('categories_statistiscs',TRUE);

		
	
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'customize_type' => array(
				'type'=>'varchar',
				'constraint'=>255,
			)
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('customize',TRUE);	
		
	$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'customize_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'meal_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
	)); 
		$this->dbforge->add_key('id',TRUE);	
		$this->dbforge->create_table('customize_meals',TRUE);		
}


	public function down(){
		$this->dbforge->drop_table('likes');
		$this->dbforge->drop_table('comments');
		$this->dbforge->drop_table('orders');
		$this->dbforge->drop_table('meals_order');
		$this->dbforge->drop_table('branch_monthly_statistics');
		$this->dbforge->drop_table('categories_statistiscs');
		$this->dbforge->drop_table('customize');
		$this->dbforge->drop_table('customize_meals');
	}

}