<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Restaurant extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'owner_id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
			),
			'description'=>array(
				'type'=>'text',
			),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'logo'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'category_id'=>array(
				'type'=>'int',
				'constraint'=>11,
				'default'=>1
			),
			'phone_nbr'=>array( //manement phone
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'rate'=>array(
				'type'=>'tinyint',
				'constraint'=>1,
				'default'=>0
			),
			'price_range'=>array(
				'type'=>'tinyint',
				'constraint'=>6,
				'default'=>0
			),
			'accept'=>array(
				'type'=>'boolean',
				'default'=>0
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		//series/stand alone restaurant it's like  restaurant "branch" father
		$this->dbforge->create_table('restaurant',TRUE);
//===================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'restaurant_id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
			),
			'address'=>array(
				'type'=>'text'
			),
			'logo'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone_nbr_1'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone_nbr_2'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'phone_nbr_3'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'accept'=>array(
				'type'=>'boolean',
				'default'=>0
			),
			'delivered'=>array(
				'type'=>'boolean',
				'default'=>0
			),
			'lat' => array(
				'type'=>'int',
				'constraint'=>25,
			),
			'lng' => array(
				'type'=>'int',
				'constraint'=>25,
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		//one restaurant
		$this->dbforge->create_table('branch',TRUE);
//===================================================================================
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
			'accept'=>array( //a category can't be accepted and shown until admin approval
				'type'=>'boolean',
				'default'=>0
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		//restaurnat series/stand alone category or type like "sea food, fast food, Ease ..."
		$this->dbforge->create_table('res_category',TRUE);
//===================================================================================
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
				'default'=>'unNamedCat'
			),
			'description'=>array(
				'type'=>'text',
			)	
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		//category for stand alone restaurant sush as "sandwish,drink cold,drink hot"
		$this->dbforge->create_table('meals_category',TRUE);
//===================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'category_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unNamedMeal'
			),			
			'description'=>array(
				'type'=>'text',
			),
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		//meal in generic meaning and description such as humburger
		$this->dbforge->create_table('meal',TRUE);
//===================================================================================	
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
			'res_id' => array( //branch I mean
				'type'=>'int',
				'constraint'=>11,
			),
			'details'=>array(
				'type'=>'text',
			),
			'price' => array(
				'type'=>'int',
			),
			'preparing_time' => array(
				'type'=>'int',
			),
			'rate'=>array(
				'type'=>'tinyint',
				'constraint'=>1,
				'default'=>0
			),
			'image'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('res_meal',TRUE);
	//===================================================================================	
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'res_id' => array( //branch I mean
				'type'=>'int',
				'constraint'=>11,
			),
			'first_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unNamedMeal'
			),
			'last_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unNamedMeal'
			),				
			'mobile_nbr'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),			
			'gender'=>array(
				'type'=>'text',
			),
			'identification_nbr'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'rate'=>array(
				'type'=>'tinyint',
				'constraint'=>1,
				'default'=>0
			),
			'image'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('worker',TRUE);
		//=================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'mobile_nbr'=>array( 
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unknown'
			),
			'verified'=>array(
				'type'=>'boolean',
				'default'=>0
			),
			'first_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unNamedMeal'
			),
			'last_name'=>array(
				'type'=>'varchar',
				'constraint'=>255,
				'default'=>'unNamedMeal'
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('customer',TRUE);
		//=================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'customer_id' => array(
				'type'=>'int',
				'constraint'=>11,
			),
			'res_id' => array( //branch I mean
				'type'=>'int',
				'constraint'=>11,
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('trusted_customer',TRUE);
		//=================================================================================
		$this->dbforge->add_field(array(
			'id' => array(
				'type'=>'int',
				'constraint'=>11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'customer_id' => array( 
				'type'=>'int',
				'constraint'=>11,
			),
			'res_id' => array( //branch I mean
				'type'=>'int',
				'constraint'=>11,
			)
		)); 	  
		$this->dbforge->add_key('id',TRUE);
		$this->dbforge->create_table('follow',TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('restaurant');
		$this->dbforge->drop_table('branch');
		$this->dbforge->drop_table('res_category');
		$this->dbforge->drop_table('meals_category');
		$this->dbforge->drop_table('meal');
		$this->dbforge->drop_table('res_meal');
		$this->dbforge->drop_table('worker');
		$this->dbforge->drop_table('customer');
		$this->dbforge->drop_table('trusted_customer');
	}
}