<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# use Hash;

class BookController extends Controller
{
    /*
     * Get books
     */
    public function index(){
    	return 'you want to view all books';
    	# return \Hash::make('secret123');
	}

    /*
     * Get books/{titles?}
     */
    public function show($title = null){
        return view('books.show')->with([
            'title' => $title,
        ]);
	}

}
