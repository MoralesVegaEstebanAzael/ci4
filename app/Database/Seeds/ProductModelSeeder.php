<?php  namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use Liior\Faker\Prices;

class ProductModelSeeder extends Seeder {
    public function run(){
        $faker = Factory::create('es_ES');
        $faker->addProvider(new Prices($faker));

        for ($i=0;$i<5;$i++){
            $data = [
                'category_id' => $faker->numberBetween(7,10),
                'unit_id' =>$faker->numberBetween(1,2),
                'name'     => $faker->name,
                'description'    => $faker->text,
                'price'    => $faker->price,
                'background'    => $faker->hexColor,
            ];
            $this->db->table('products')->insert($data);
        }
    }
}