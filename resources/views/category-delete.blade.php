@extends('layouts.mainlayout')
 
@section('title', 'Delete category')
 
@section('content')

<h1>Delete category</h1>

<div class="my-3 delete-category-btn">
    <strong class="d-flex justify-content-center align-items-center">
        Are you sure want to delete category {{ $categories->name }} ?
    </strong>

    <div class="d-flex justify-content-center align-items-center">
        <a href="/category-destroy/{{ $categories->slug }}" class="btn btn-danger col-3">Delete</a>
        <a href="/category" class="btn btn-primary col-3">Cancel</a>
    </div>
</div>

@endsection