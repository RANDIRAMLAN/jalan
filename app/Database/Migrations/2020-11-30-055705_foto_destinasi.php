<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FotoDestinasi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_destinasi'    => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'foto'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
		]);
		$this->forge->createTable('foto_destinasi');
	}

	public function down()
	{
		$this->forge->dropTable('foto_destinasi');
	}
}
