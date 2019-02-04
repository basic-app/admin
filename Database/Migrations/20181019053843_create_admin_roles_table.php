<?php

namespace BasicApp\Admin\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_create_admin_roles_table extends Migration
{

	public $tableName = 'admin_roles';

	public function up()
	{
		$this->forge->addField([
			'role_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true
			],
			'role_uid' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'unique' => true,
				'null' => true,
				'default' => null
			],
			'role_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255
			]
		]);

		$this->forge->addKey('role_id', true);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}