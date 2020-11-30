<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Deskripsi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_destinasi'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'paragraf'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '1000',
			],
		]);
		$this->forge->createTable('deskripsi');
	}

	public function down()
	{
		$this->forge->dropTable('deskripsi');
	}
}
