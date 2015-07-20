<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Install_ion_auth extends CI_Migration {

	public function up()
	{
		// Drop table 'groups' if it exists		
		$this->dbforge->drop_table('groups');

		// Table structure for table 'groups'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('groups');

		// Dumping data for table 'groups'
		$data = array(
			array(
				'id' => '1',
				'name' => 'admin',
				'description' => 'Administrator'
			),
			array(
				'id' => '2',
				'name' => 'members',
				'description' => 'Business_owner'
			)
		);
		$this->db->insert_batch('groups', $data);


		// Drop table 'users' if it exists
		$this->dbforge->drop_table('users');

		// Table structure for table 'users'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'first_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			),
			'last_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'gender'=> array(
				'type' => 'tinyint',
				'constraint' => '1',
			),
			'bs_owner'=> array(
				'type' => 'tinyint',
				'constraint' => '1',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');

		// Dumping data for table 'users'
		$data = array(
			'id' => '1',
			'password' => 'AQBCBZ/2EROnDstUgEudkMGtLeI4PKDSlpZm02rlRDs=',
			'email' => 'admin@admin.com',
			'first_name' => 'Admin',
			'last_name' => 'istrator',
			'phone' => '0',
			'gender'=>'0'
		);
		$this->db->insert('users', $data);


		// Drop table 'users_groups' if it exists		
		$this->dbforge->drop_table('users_groups');

		// Table structure for table 'users_groups'
		$this->dbforge->add_field(array(
			'user_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			),
			'group_id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned' => TRUE
			)
		));
		$this->dbforge->create_table('users_groups');

		// Dumping data for table 'users_groups'
		$data = array(
			array(
				'user_id' => '1',
				'group_id' => '1',
			)
		);
		$this->db->insert_batch('users_groups', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
		$this->dbforge->drop_table('groups');
		$this->dbforge->drop_table('users_groups');
	}
}
