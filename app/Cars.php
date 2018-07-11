<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';
    protected $fillable = ['name', 'price'];
    public $timestamp = false; //Khi khong muon lay timestime
    public function color () {
        return $this->belongsToMany('App\Colors', 'car_colors', 'car_id', 'color_id');
    }
}
