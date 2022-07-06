<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//route::get('/',function(){
//    return view('welcome');
//});

//route::get('/',function(){
//    $data=[];
//    $data['name']='Baraa';
//    $data['age']=24;
//    return view('welcome',$data);
//});

//route::get('/',function(){
//    Route::get('/', [UserController::class,'getindex']);
//});

//route::namespace('Front')->group(function(){
//    route::get('/',[UserController::class,'getindex']);
//});

Auth::routes(['verify'=>true]);

route::get('/',[UserController::class,'getindex']);


route::get('/landing',function(){
    return view('landing');
});

route::get('/about',function(){
    return view('about');
});


Route::get('/welcome', function ()
{

    return "welcome";
});


//rout parameters

Route::get('/show number/{id}', function ($id) {
    return $id;
});

Route::get('/show string/{id?}', function () {
    return "optional id";
});


//route namespace

route::namespace('Front')->group(function(){

    //all routes only access controller or methods in folder name Front
    route::get('user',[UserController::class,'showUserName']);
});


//route prefix

route::prefix('users')->group(function(){

    route::get('show',[UserController::class,'showUserName']);
});


//route middleware

route::get('check',function(){
   return 'middleware';
})->middleware('auth');


//route group (prefix &? namespace &? middleware)

route::group(['prefix'=>'users','namespace'=>'Front','middleware'=>'auth'],function(){


});


//


route::group(['namespace'=>'Admin','middleware'=>'auth'],function(){
    route::get('second',[SecondController::class,'showString']);
});


route::get('login',function(){
   return "please login to reach this url";
}) -> name('login');


//route resource

route::resource('news',NewsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
