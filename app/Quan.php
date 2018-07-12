<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    protected $table = 'courses';
    protected $fillable = ['id', 'course', 'teacher', 'price','image'];
    // protected $hidden
    public $timesamps = false; //Khi khong muon lay timestime
}
