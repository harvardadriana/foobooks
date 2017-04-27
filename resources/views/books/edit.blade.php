{{-- /resources/views/books/new.blade.php --}}
@extends('layouts.master')

@section('title')
    Edit book: {{ $book->title }}
@endsection

@section('content')
    <h1>Edit book: {{ $book->title }}</h1>

    <form method='POST' action='/books/edit'>
        {{ csrf_field() }}

        <small>* Required fields</small><br />

        <input type="hidden" name="id" value="{{ $book->id }}"> 

        <label for='title'>* Title</label><br />
        <input type='text' name='title' id='title' value='{{ old('title', $book->title) }}'><br />

        <label for='published'>* Published Year</label><br />
        <input type='text' name='published' id='published' value='{{ old('published', $book->published) }}'><br />

        <label for='cover'>* URL to a cover image</label><br />
        <input type='text' name='cover' id='cover' value='{{ old('cover', $book->cover) }}'><br />

        <label for='purchase_link'>* Published Year</label><br />
        <input type='text' name='purchase_link' id='purchase_link' value='{{ old('purchase_link', $book->purchase_link) }}'><br />

        <br>
        <input class='btn btn-primary' type='submit' value='Save changes'>
    </form>


    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection