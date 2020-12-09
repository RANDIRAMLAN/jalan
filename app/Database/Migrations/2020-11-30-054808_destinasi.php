<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Destinasi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul_destinasi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'deskripsi_singkat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'foto' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status' => [
				'type'           => 'VARCHAR',
				'constraint'     => '12',
			],
			'penulis' => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('destinasi');
	}

	public function down()
	{
		$this->forge->dropTable('destinasi');
	}
}
