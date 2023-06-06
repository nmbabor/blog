<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');
Route::get('posts', 'HomeController@all');
Route::get('about', 'HomeController@about');
Route::get('posts/{link}', 'AllPostController@categeory');
Route::get('post/{id}/{link}', 'AllPostController@single');
Route::get('page/{link}', 'PageController@show');

Route::middleware(['auth'])->group(function () {

	Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
	Route::resource('category','CategoryController');
	Route::resource('sub-category','SubCategoryController');
	Route::resource('posts-admin','PostController');
	Route::get('load-sub-cat/{id}','PostController@loadSubCat');
	Route::get('search-tag','PostController@searchTag');
	Route::get('subCategoryTag/{id}','PostController@searchTags');
	Route::get('profile','ProfileController@index');
	Route::post('profile','ProfileController@store');
	Route::resource('social-links','SocialController');
	Route::resource('others-info','OthersInfoController');
	Route::get('other/about','OthersInfoController@about');
		// ACL
	Route::resource('acl-permission', 'AclPermissionController');
	Route::post('acl-permission-role', 'AclPermissionController@storeRole');
	// ACL END
	Route::resource('/users', 'UsersController');
	Route::post('change-password',['as'=>'password','uses'=>'UsersController@password']);
	Route::get('change-password','UsersController@changePass');
	Route::resource('menu','MenuController');
	Route::get('page-menu','MenuController@page');
	Route::resource('sub-menu','SubMenuController');
	Route::resource('sub-sub-menu','SubSubMenuController');
	Route::resource('pages','PagesController');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
