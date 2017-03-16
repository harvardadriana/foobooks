<?php


/**
 * Practice - log viewer
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


// Route::get('/example', function(){
//	return Hash::make('secret123');
// });

Route::get('/books', 'BookController@index');

Route::get('/books/{title?}', 'BookController@show');

// Route::get('/books/{title?}', 'BookController@show');


// we can configure to route only if condition applies
if(config('app.env') == 'local') {
	#Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


/**
 * Main homepage visitors see when they visit just /
 */
Route::get('/', 'WelcomeController');