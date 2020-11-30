<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
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
			'menu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'attribut' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'role_id' => [
				'type'			 => 'INT',
				'constraint'	 => 2,
			],
			'icon' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('menu');
	}

	public function down()
	{
		$this->forge->dropTable('menu');
	}
}
