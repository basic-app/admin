<?php

namespace BasicApp\Admin\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_admins_table extends Migration
{

	public $tableName = 'admins';

	public function up()
	{
		$this->forge->addField([
			'admin_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'admin_role_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true
			],			
			'admin_created_at' => [
				'type' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
				'null' => true
			],
			'admin_updated_at' => [
				'type' => 'TIMESTAMP NULL',
				'default' => null
			],
			'admin_email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => true,
				'null' => true,
				'default' => null
			],
			'admin_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'admin_password_hash' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			],
			'admin_avatar' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true
			]
		]);

		$this->forge->addKey('admin_id', true);

		$this->forge->addForeignKey('admin_role_id', 'admin_roles', 'role_id', 'RESTRICT', 'RESTRICT');

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}