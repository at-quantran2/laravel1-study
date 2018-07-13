<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    public function getLogin() {
        return view('auth.studentLogin');
    }
    public function postLogin(StudentRequest $request) {
        // 
        $validated = $request->validated();
    }
}
