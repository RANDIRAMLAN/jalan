<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubMenu extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'menu_id'          => [
				'type'           => 'INT',
				'constraint'     => 2,
			],
			'sub_menu'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'icon' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'attribut' => [
				'type'			 => 'VARCHAR',
				'constraint'	 => '50',
			],
			'url' => [
				'type'			 => 'VARCHAR',
				'constraint'     => '50'
			]
		]);
		$this->forge->createTable('sub_menu');
	}

	public function down()
	{
		$this->forge->dropTable('sub_menu');
	}
}
