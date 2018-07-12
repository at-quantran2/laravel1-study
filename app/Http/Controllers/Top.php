<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quan;

class Top extends Controller
{
    public function show (Request $request) {
        $course = new Quan();
        $course->course = $request->name;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->save();
        return redirect('form/layout');
    }
}
