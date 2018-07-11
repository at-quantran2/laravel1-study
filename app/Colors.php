<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';
    protected $fillable = ['name'];
    public $timestamp = false; //Khi khong muon lay timestime
    public function car () {
        return $this->belongsToMany('App\Cars', 'car_colors', 'car_id', 'color_id');
    }
}
