<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['id', 'name', 'price', 'cate_id'];
    public $timestamp = false; //Khi khong muon lay timestime
}
