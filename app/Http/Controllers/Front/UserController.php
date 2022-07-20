<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function showUserName(){

        return 'Baraa';
    }

//    public function getindex(){
//        return view('welcome')-> with(['name' => 'Baraa' , 'age' => 24]);
//    }

//    public function getindex(){
//        $data=[];
//        $data['name']='Baraa';
//        $data['age']=24;
//        return view('welcome',$data);
//    }

    public function __construct(){
        $this->middleware('auth');
    }


    public function getindex(){
        $obj = new \stdClass();

        $obj -> name = 'Baraa';
        $obj -> age = 24;

        $data = ['a' => 'baraa','b' => 'ahmad', 'c' => 'omar'];

        return view('welcome',compact('obj','data'));
    }

}
