<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function showinfor() {
        return view('top.top1');
    }
    public function testAction() {
        echo 'test succesfully';
        return redirect()->route('thq');
    }
    public function show(Request $request) {
        print_r($request->input());
    }
}
