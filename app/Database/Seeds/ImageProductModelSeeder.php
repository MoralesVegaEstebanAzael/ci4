<?php


namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ImageProductModelSeeder extends Seeder
{
    public function run(){
        $faker = Factory::create('es_ES');

        for ($i=0;$i<5;$i++){
            $data = [
                'product_id' => $faker->numberBetween(1,5),
                'url' =>$faker->imageUrl(),
            ];
            $this->db->table('images_product')->insert($data);
        }
    }
}