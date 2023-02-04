@extends('layouts.mainlayout')
 
@section('title', 'Delete user')
 
@section('content')

<div>
    <h2>Delete user</h2>
</div>

<div class="my-3 delete-btn">
    <strong class="d-flex justify-content-center align-items-center">
        Are you sure want to delete user {{ $users->username }} ?
    </strong>

    <div class="d-flex justify-content-center align-items-center">
        <a href="/user-destroy/{{ $users->slug }}" class="btn btn-danger col-3">Delete</a>
        <a href="/user" class="btn btn-primary col-3">Cancel</a>
    </div>
</div>

@endsection