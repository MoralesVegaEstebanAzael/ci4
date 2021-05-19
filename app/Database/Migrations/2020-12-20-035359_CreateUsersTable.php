<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'phone'          =>[
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => true
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'unique'         => true,
                'null'           => true
            ],


        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
