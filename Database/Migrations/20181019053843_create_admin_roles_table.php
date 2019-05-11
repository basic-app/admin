<?php

namespace BasicApp\Admin\Database\Migrations;

class Migration_create_admin_roles_table extends \BasicApp\Core\Migration
{

	public $tableName = 'admin_roles';

	public function up()
	{
		$this->forge->addField([
			'role_id' => $this->primaryColumn(),
			'role_uid' => $this->stringColumn([
				'unique' => true
			]),
			'role_name' => $this->stringColumn()
		]);

		$this->forge->addKey('role_id', true);

		$this->forge->createTable($this->tableName, false, ['ENGINE' => 'InnoDB']);
	}

	public function down()
	{
		$this->forge->dropTable($this->tableName);
	}

}