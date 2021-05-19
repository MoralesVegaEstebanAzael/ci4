<?php


namespace App\Models;


use CodeIgniter\Model;

class ImageProductModel extends Model
{
    protected $table = 'images_product';
    protected $allowedFields=['product_id','url'];



}