<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImagesProductTable extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'product_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'url'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '1000',
            ],
        ]);
        $this->forge->addForeignKey('product_id','products','id','CASCADE','CASCADE');
        $this->forge->createTable('images_product');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
