<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Students;
class StudentController extends Controller
{
    public function getLogin() {
        return view('auth.studentLogin');
    }
    public function postLogin(StudentRequest $request) {
        // 
        $validated = $request->validated();
        
        $user = new Students();
        $user->user_name = $request->user_name;
        $user->password = $request->password;
        $user->save();
    }
}
