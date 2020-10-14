<?php

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

Route::get("/","PostsController@index");
Route::get("/post/create","PostsController@create");
Route::post("/post/store","PostsController@store")->name("storeposts");
Route::get("/home", function(){
	return "hello";
})->name("redirect");


Route::get("/admin", "ProductsController@index")->name("adminIndex");

Route::get("/admin/show/{id}", "ProductsController@show")->name("adminShow");

Route::get("/admin/edit/{id}", "ProductsController@edit")->name("adminEdit");

Route::get("/admin/create", "ProductsController@create")->name("adminCreate");

Route::post("/admin/store", "ProductsController@store")->name("adminStore");

Route::post("/admin/delete", "ProductsController@delete")->name("adminDelete");

Route::post("/admin/update", "ProductsController@update")->name("adminUpdate");


Route::post("/admin/store/comments", "ProductsController@store_comments")->name("store_comment");