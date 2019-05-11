<?php

namespace BasicApp\Admin\Database\Migrations;

class Migration_create_admins_table extends \BasicApp\Core\Migration
{

	public $tableName = 'admins';

	public function up()
	{
		$this->forge->addField([
			'admin_id' => $this->primaryColumn(),
			'admin_role_id' => $this->foreignColumn(),			
			'admin_created_at' => $this->createdColumn(),
			'admin_updated_at' => $this->updatedColumn(),
			'admin_email' => $this->stringColumn([
				'unique' => true
			]),
			'admin_name' => $this->stringColumn(),
			'admin_password_hash' => $this->stringColumn(),
			'admin_avatar' => $this->stringColumn()
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