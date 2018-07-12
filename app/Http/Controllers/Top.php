<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quan;
use App\Http\Requests\TopRequest;
class Top extends Controller
{
    public function show (Request $request) {    
        $request->validate([
            'name' => 'required|unique:courses,course',    
            'teacher' => 'required',   
            'price' => 'required'
            ],
            [
                'name.required' => 'Nhap ten mon hoc',
                'teacher.required' => 'Nhap ten giang vien',
                'price.required' => 'Nhap gia',
                'name.unique'=> 'Ten Mon hoc da ton tai'
            ]
        ); 
        $course = new Quan();
        $course->course = $request->name;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->save();
        return redirect('form/layout');
    }
}
