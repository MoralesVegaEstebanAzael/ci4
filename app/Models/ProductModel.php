<?php


namespace App\Models;


use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $allowedFields=['category_id','unit_id','name','description','price','background'];



}