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

/*Route::any( '{all}', function( $uri ) {
  return View::make( 'template' );
})->where( 'all', '.*' );
*/


Route::group(array('prefix' => 'cms'), function(){

  Route::any( '/', function() {
    return View::make( 'cms.main' );
  });

  Route::post('/auth/login', array('before' => 'csrf_json', 'uses' => 'AuthController@login'));
  Route::get('/auth/logout', 'AuthController@logout');
  Route::get('/auth/status', 'AuthController@status');
  Route::get('/auth/secrets','AuthController@secrets');

});