<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\SecondController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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

///
//Localization
Route::get('offers/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

//get the same language on session
App::setLocale($locale);
session()->put('locale', $locale);
return back();
});
///

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

Route::get('fillable',[\App\Http\Controllers\CrudController::class,'getoffers']);

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

route::group(['prefix' => 'offers'],function(){
    route::get('store',[CrudController::class,'store']);
    route::get('update',[CrudController::class,'update']);
    route::get('create',[CrudController::class,'create']);
    route::post('save',[CrudController::class,'save']) -> name('offer.save');
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
