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

  Route::post('auth/login', array('before' => 'csrf_json', 'uses' => 'AuthController@login'));
  Route::get('auth/logout', 'AuthController@logout');
  Route::get('auth/status', 'AuthController@status');
  Route::get('auth/rest','AuthController@rest');

  Route::group(array('prefix' => 'api'), function(){
  	
		// pages api
		Route::group(array('prefix' => 'pages'), function(){

			Route::get('rest','PageController@rest');
			Route::get('rest/{id}','PageController@restId')->where('id', '[0-9]+');
			Route::get('rest/{key}/{value}','PageController@restWhere');
			
			Route::post('rest/{id}','PageController@restIdPost')->where('id', '[0-9]+');
			
			Route::post('save','PageController@save');
			Route::post('create','PageController@create');
		});
    // blocks
  
    Route::group(array('prefix' => 'blocks'), function(){
      
      Route::get('rest','BlocksController@rest');
      Route::get('pbrest','BlocksController@pbrest');

    });
  });
});

Route::get('/error{code}', array('as' => 'error.404', 'uses' => 'PageController@error'));

Route::any( '{all}', 'PageController@page')->where( 'all', '.*' );

