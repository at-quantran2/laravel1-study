<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quan;
use App\Http\Requests\TopRequest;
use Illuminate\Http\File;
// use Illuminate\Support\Facades\Storage;

class Top extends Controller

{
    public function show (Request $request) {    
        $request->validate([
            'name' => 'required|unique:courses,course',    
            'teacher' => 'required',   
            'price' => 'required',
            'image' => 'required'
            ],
            [
                'name.required' => 'Nhap ten mon hoc',
                'teacher.required' => 'Nhap ten giang vien',
                'price.required' => 'Nhap gia',
                'image.required' => 'Nhap file',
                'name.unique'=> 'Ten Mon hoc da ton tai'
            ]
        ); 
        $course = new Quan();
        $course->course = $request->name;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->image = $request->file('image')->getClientOriginalName();
        $des = 'images'; //default root is storage/app/
        $path = $request->file('image')->storeAs($des, $course->image);
        $course->save();
        return redirect('form/layout');
    }
}
