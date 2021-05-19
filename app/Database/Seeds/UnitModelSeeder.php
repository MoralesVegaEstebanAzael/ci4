<?php


namespace App\Database\Seeds;


class UnitModelSeeder extends \CodeIgniter\Database\Seeder {
    public function run(){
        $data = [
            ['name' => 'kilogramo',],
            ['name' => 'pieza',]
        ];

        $this->db->table('units')->insertBatch($data);
    }
}