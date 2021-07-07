<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

route

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
//use App\Persone;

 route::apiResource('/person','PersonController');
  //route::apiResource('/person','PersonController@i');

route::resource('posts','PostsController')->except(['edit']);
route::post('poster','PostsController@create');

Route::group(['middleware'=>['api','checkpass','checklang']],function(){
  Route::post('First','CategoryController@index');
  Route::post('second','CategoryController@show');
  Route::post('change','CategoryController@status');

  route::group(['prefix'=>'admin','namespace'=>'admin'],function(){
    route::post('login','AuthController@login');
    route::post('logout','AuthController@logout')->middleware('Guards:admin_api');
  });

  route::group(['prefix'=>'user','namespace'=>'user'],function(){
    route::post('login','userController@login');
    //route::post('logout','AuthController@logout')->middleware('Guards:admin_api');
  });


  route::group(['prefix'=>'user','middleware'=>'Guards:user_api'],function(){
    route::post('profile',function(){
return auth::user();
    });

  });


});
