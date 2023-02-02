@extends('layouts.mainlayout')
 
@section('title', 'Deleted books')
 
@section('content')

<div>
    <h2>Deleted books</h2>
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="return-btn my-5 d-flex justify-content-start">
    <a href="/book" class="btn btn-primary">
        <div><i class="bi bi-arrow-left"></i>Book list</div>
    </a>
</div>

<div class="my-5 deleted-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Code</th>
                <th>Title</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($deletedBooks as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->book_code }}</td>
                    <td>{{ $item->title }}</td>
                    <td style="text-align: center">
                        <a href="/book-restore/{{ $item->slug }}" class="btn btn-secondary col-5">
                            <i class="bi bi-arrow-counterclockwise"></i>Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection