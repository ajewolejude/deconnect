<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('interest', 'InterestController@getall');
Route::get('interests', 'InterestsController@getall');
Route::get('interests/{id}', 'InterestsController@show');
Route::post('interestsubmit', 'InterestsController@store');
Route::delete('interestdelete/{id}', 'InterestsController@destroy');


Route::post('interestofusers/add', 'InterestUsersController@store');

Route::get('interestofusers/user/{user_id}', 'InterestUsersController@show');



//Conection
Route::post('connection/post', 'ConnectionController@store');
Route::get('connection/', 'ConnectionController@getall');
Route::get('connection/user/get/{id}', 'ConnectionController@getone');
Route::delete('connection/delete/{user_id}', 'ConnectionController@destroy');


Route::post('userLogin', 'UserController@userLogin');
Route::post('userRegister', 'UserController@userRegister');
Route::get('userDetail/{id}', 'UserController@userDetail');
Route::put('updateDetail/{id}', 'UserController@updateDetail');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('userDetails', 'UserController@userDetails');
    Route::post('userLogout','UserController@logoutApi');

});
