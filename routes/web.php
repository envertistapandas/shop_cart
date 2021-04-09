<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//////////////////////Normal User//////////////////////////
Route::get('/home', 'HomeController@index')->name('home');
//////////////////////////Admin///////////////////////////
Route::get('admin/home', 'AdminController@adminHome')->name('admin.home')->middleware('is_admin');
///////////////////////////Dashboard/////////////////////
//Route::prefix('admin')->name('admin.')->group(function (){
    Route::get('dashboard', 'AdminController@index2');
//});
Route::get('/add-catagory', 'CategoryController@index'); 
Route::get('/all-category','CategoryController@all_category');
Route::post('/save-category', 'CategoryController@save_category');
Route::get('/unactive-category{id}','CategoryController@unactive_category');
Route::get('/active-category{id}','CategoryController@active_category');
Route::get('/edit-category{id}','CategoryController@edit_category');
Route::post('/update-category{id}','CategoryController@update_category');
Route::get('/delete-category{id}','CategoryController@delete_category');

Route::get('/add-product','ProductController@index');
Route::post('/save-product','ProductController@save_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/unactive-product{id}','ProductController@unactive_product');
Route::get('/active-product{id}','ProductController@active_product');
Route::get('/edit-product{id}','ProductController@edit_product');
Route::post('/update-product{id}','ProductController@update_product');
Route::get('/delete-product{id}','ProductController@delete_product');

Route::get('/add-brand', 'BrandController@index');
Route::get('/all-brand','BrandController@all_brand');
Route::post('/save-brand', 'BrandController@save_brand');
Route::get('/unactive-brand{id}','BrandController@unactive_brand');
Route::get('/active-brand{id}','BrandController@active_brand');
Route::get('/edit-brand{id}','BrandController@edit_brand');
Route::post('/update-brand{id}','BrandController@update_brand');
Route::get('/delete-brand{id}','BrandController@delete_brand');