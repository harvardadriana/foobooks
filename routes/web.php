<?php


# Route::get('/example', function(){
#	return Hash::make('secret123');
# });

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database foobooks');
        DB::statement('CREATE database foobooks');

        return 'Dropped foobooks; created foobooks.';
    });

};


Route::get('/debug', function() {

	echo '<pre>';

	echo '<h1>Environment</h1>';
	echo App::environment().'</h1>';

	echo '<h1>Debugging?</h1>';
	if(config('app.debug')) echo "Yes"; else echo "No";

	echo '<h1>Database Config</h1>';
    	echo 'DB defaultStringLength: '.Illuminate\Database\Schema\Builder::$defaultStringLength;
    	/*
	The following commented out line will print your MySQL credentials.
	Uncomment this line only if you're facing difficulties connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your production server, making your credentials public.
        */
	//print_r(config('database.connections.mysql'));

	echo '<h1>Test Database Connection</h1>';
	try {
		$results = DB::select('SHOW DATABASES;');
		echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
		echo "<br><br>Your Databases:<br><br>";
		print_r($results);
	}
	catch (Exception $e) {
		echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
	}

	echo '</pre>';

});



/** Book related routes
 * foobooks/public/books/
 */
Route::get('/books', 'BookController@index');

# new.blade.php
Route::get('/books/new', 'BookController@createNewBook');
Route::post('/books/new', 'BookController@storeNewBook');

# edit.blade.php
Route::get('/books/edit/{id}', 'BookController@edit');
Route::post('/books/edit', 'BookController@saveEdits');

# delete.blade.php
Route::get('/books/delete/{id}', 'BookController@delete');
Route::post('/books/delete', 'BookController@deleteBook');

# display book
Route::get('/books/{title?}', 'BookController@show');

# search book
Route::get('/search', 'BookController@search');


/**
 * Log viewer
 */
if(config('app.env') == 'local') {
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}


/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


/** Main Homepage
 * foobooks/
 */
Route::get('/', 'BookController@index');