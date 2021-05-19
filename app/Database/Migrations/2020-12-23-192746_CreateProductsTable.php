<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    { //id name description,price,unit,category,images,background

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'unit_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
//            'images_id'          => [
//                'type'           => 'INT',
//                'constraint'     => 5,
//                'unsigned'       => true,
//            ],
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'description'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '250',
            ],
            'price'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'background'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
            ]
        ]);
        $this->forge->addKey('id', true);
//        $this->forge->addKey('category_id');
//        $this->forge->addKey('unit_id');
//        $this->forge->addKey('images_id');

        $this->forge->addForeignKey('category_id','categories','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('unit_id','units','id','CASCADE','CASCADE');
//        $this->forge->addForeignKey('images_id','images_product','id','CASCADE','CASCADE');
        $this->forge->createTable('products');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        //
    }
}
