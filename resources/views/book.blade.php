@extends('layouts.mainlayout')
 
@section('title', 'Book')
 
@section('content')

<div>
    <h2>List of Books</h2>
</div>

<div class="add-del-books-btn mt-3 d-flex justify-content-end">
    <a href="book-add" class="me-3 btn btn-primary">
        <div><i class="bi bi-plus-lg"></i>New book</div>
    </a>
    <a href="book-deleted-list" class="btn btn-danger">
        <div><i class="bi bi-trash"></i>Deleted books</div>
    </a>
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="my-5 book-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Code</th>
                <th>Title</th>
                <th>Category</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td>@foreach ($item->categories as $category)
                        <li>{{ $category->name }} </li>
                        @endforeach
                    </td>
                    <td style="text-align: center">{{ $item->status }}</td>
                    <td style="text-align: center">
                        <a style="color: white" href="/book-edit/{{ $item->slug }}" class="btn btn-info col-6 mb-2">
                            <i class="bi bi-pencil-square"></i>Edit</a>
                        <a href="/book-delete/{{ $item->slug }}" class="btn btn-danger col-6">
                            <i class="bi bi-trash3"></i>Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection