@extends('layouts.mainlayout')
 
@section('title', 'Category')
 
@section('content')

<div>
    <h2>List of Category</h2>
</div>

<div class="add-delete-btn mt-3 d-flex justify-content-end">
    <a href="category-add" class="me-3 btn btn-primary">
        <div><i class="bi bi-plus-lg"></i>New category</div>
    </a>
    <a href="category-deleted-list" class="btn btn-danger">
        <div><i class="bi bi-trash"></i>Deleted categories</div>
    </a>
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="my-5 category-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td style="text-align: center">
                        <a style="color: white" href="/category-edit/{{ $item->slug }}" class="btn btn-info col-3">
                            <i class="bi bi-pencil-square"></i>Edit</a>
                        <a href="/category-delete/{{ $item->slug }}" class="btn btn-danger col-3">
                            <i class="bi bi-trash3"></i>Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection