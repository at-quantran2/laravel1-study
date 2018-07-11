<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quan extends Model
{
    protected $table = 'course';
    protected $fillable = ['id', 'name', 'teacher', 'price'];
    // protected $hidden
    public $timesamps = false; //Khi khong muon lay timestime
}
