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
    return view('universo.index');
});

Auth::routes();

Route::get('/', 'PageController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'role:superadmin'])
    ->group(function() {
        Route::resource('user', 'UserController');
        Route::resource('permission', 'PermissionController');
        Route::resource('role', 'RoleController');
    });

Route::resource('article', 'ArticleController');
Route::resource('tournament', 'TournamentController');

Route::get( '{page}', function ( $page ) {
 	if ( \View::exists( "universo.$page" ) )
		return view( "universo.$page" );
	else 
		abort(404);
});
