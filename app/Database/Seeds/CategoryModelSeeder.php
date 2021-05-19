<?php


namespace App\Database\Seeds;


class CategoryModelSeeder extends \CodeIgniter\Database\Seeder {
    public function run(){
        $data = [
            ['name' => 'frutas',],
            ['name' => 'verduras',],
            ['name' => 'chiles secos',],
            ['name' => 'lacteos',]
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}