<?php  namespace App\Database\Seeds;


class TestSeeder extends \CodeIgniter\Database\Seeder{
    public function run(){
//        $this->call('UserModelSeeder');
//        $this->call('CategoryModelSeeder');
//        $this->call('UnitModelSeeder');
//        $this->call('ProductModelSeeder');
        $this->call('ImageProductModelSeeder');

    }
}