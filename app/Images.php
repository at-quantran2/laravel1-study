<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'product_id'];
    public $timestamp = false; //Khi khong muon lay timestime
    public function product () {
        return $this->belongsTo('App\Product');
    }
}
