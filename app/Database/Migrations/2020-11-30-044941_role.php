<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 2,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'role'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '25',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('role');
	}

	public function down()
	{
		$this->forge->dropTable('role');
	}
}
