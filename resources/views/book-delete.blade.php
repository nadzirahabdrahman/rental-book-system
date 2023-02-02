@extends('layouts.mainlayout')
 
@section('title', 'Delete book')
 
@section('content')

<div>
    <h2>Delete book</h2>
</div>

<div class="my-3 delete-category-btn">
    <strong class="d-flex justify-content-center align-items-center">
        Are you sure want to delete book {{ $books->title }} ?
    </strong>

    <div class="d-flex justify-content-center align-items-center">
        <a href="/book-destroy/{{ $books->slug }}" class="btn btn-danger col-3">Delete</a>
        <a href="/book" class="btn btn-primary col-3">Cancel</a>
    </div>
</div>

@endsection