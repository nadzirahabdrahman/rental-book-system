@extends('layouts.mainlayout')
 
@section('title', 'Edit category')
 
@section('content')

<h1>Edit Category</h1>

<div class="my-5 col-8 m-auto ">

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>
        
    @endif

    <form action="/category-edit/{{ $categories->slug }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category name"
            value="{{ $categories->name }}">
        </div>

        <div class="my-3 edit-category-btn d-flex justify-content-center align-items-center">
            <button class="btn btn-success col-5" type="submit"><a>Update</a></button>
            <a href="/category" class="btn btn-danger col-5">Cancel</a>
            {{-- <button class="my-3 btn btn-success form-control" type="submit">Update</button>
            <button class="my-3 btn btn-danger form-control" href="#">Cancel</button> --}}
        </div>
        
    </form>
</div>

@endsection