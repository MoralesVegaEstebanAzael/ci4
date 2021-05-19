<?php  namespace App\Database\Seeds;


class UserModelSeeder extends \CodeIgniter\Database\Seeder {
    public function run(){
        //name','password','phone','email'
        $faker = \Faker\Factory::create('es_ES');

        for ($i=0;$i<5;$i++){
            $data = [
                'name' => $faker->name,
                'password' =>$faker->password,
                'phone'     => $faker->phoneNumber,
                'email'    => $faker->email,
            ];

//            $this->db->query("INSERT INTO users (name,password,phone, email)
//                            VALUES(:name:, :password:,:phone:,:email:)",
//                $data
//            );
//            $this->db->table('users')->insert($data);
            $this->db->table('users')->insert($data);
        }
    }
}