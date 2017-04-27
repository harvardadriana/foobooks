@extends('layouts.master')

<!-- add css -->
@push('head')
	<link rel="stylesheet" type="text/css" href="/css/books/show.css">
@endpush

@section('title')
	Delete book: {{ $book->title }}
@endsection

@section('content')

    <form method='POST' action='/books/delete'>
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $book->id }}"> 
		<h1>Delete book: </h1> <br/>
		Book title: {{ $book->title }} <br/>
		Published: {{ $book->published }} <br/>
		<img src="{{ $book->cover }}" /> <br/>
		Purchase link: {{ $book->purchase_link }} <br/>

		<br>
	    <input type='submit' class='btn btn-primary btn-small' value='Delete book?'>

    </form>


@endsection
	

<!-- add js -->
@push('body')
	<script src="/js/books/show.js"></script>
@endpush