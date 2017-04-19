@extends('layouts.master')

<!-- add css -->
@push('head')
	<link rel="stylesheet" type="text/css" href="/css/books/show.css">
@endpush

@section('title')
	Show book: {{ $title }}
@endsection

@section('content')
	<h1>Show book: {{ $title }}</h1>
@endsection
	

<!-- add js -->
@push('body')
	<script src="/js/books/show.js"></script>
@endpush