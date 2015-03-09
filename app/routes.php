<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('vue1');
});
  */
Route::get('article/{n}', function($n) {
	return View::make('article')->with('numero', $n);
})->where('n', '[0-9]+');

Route::get('facture/{n}', function($n) {
	return View::make('facture')->with('numero', $n);
})->where('id', '[0-9]+');

Route::get('/', 'HomeController@index');
Route::get('/welcome', 'HomeController@showWelcome');

Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

Route::controller('contact', 'ContactController');
Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForms');


Route::controller('users', 'UsersController');
/*Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');
Route::get('users', 'UsersController@getInfos');
  */
Route::post('users', array(
	'before' => 'csrf',
	'uses' => 'UsersController@postInfos'
));

Route::controller('photo', 'PhotoController');
//Route::get('photo', 'PhotoController@getForm');
//Route::post('photo', 'PhotoController@postForm');


Route::controller('email', 'EmailController');

Route::resource('user', 'UserController');

Route::controller('auth', 'AuthController');

Route::controller('password', 'RemindersController');

Route::controller('post', 'PostController');