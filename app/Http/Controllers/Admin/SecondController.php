<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SecondController extends Controller
{
//    public function _construct(){
//        $this->middleware('auth');
//    }

    public function showString(){
        return 'static string';
    }
}
