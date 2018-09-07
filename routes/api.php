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

Route::middleware('auth:api')->get('/user', function(Request $request) {
	return $request->user();
});


Route::get('news', 'NewsController@index');
Route::get('galleries', 'GalleryController@index');

Route::group([ 'middleware' => [ 'api', 'admin' ]], function() {

	Route::post('news', 'NewsController@store');
	Route::get('news/{slug}', 'NewsController@show');
	Route::put('news/{slug}', 'NewsController@update');
	Route::delete('news/{slug}', 'NewsController@destroy');

	Route::post('galleries', 'GalleryController@store');
	Route::get('galleries/{gallery}', 'GalleryController@show');
	Route::put('galleries/{gallery}', 'GalleryController@update');
	Route::delete('galleries/{gallery}', 'GalleryController@destroy');

});


/**
 * Раздел тэгов
 */
Route::resource('tags', 'TagController');