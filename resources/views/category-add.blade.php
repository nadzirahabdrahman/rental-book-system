@extends('layouts.mainlayout')
 
@section('title', 'Add category')
 
@section('content')

<div>
    <h2>Add category</h2>
</div>


<div class="my-5 col-8 m-auto">

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>
        
    @endif

    <form action="category-add" method="post">
        @csrf
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category name">
        </div>

        <div class="my-3 edit-category-btn d-flex justify-content-center align-items-center">
            <button class="btn btn-success col-5" type="submit">Save</button>
            <a href="/category" class="btn btn-danger col-5">Cancel</a>
        </div>
        
    </form>
</div>

@endsection