@extends('layouts.mainlayout')
 
@section('title', 'Deleted categories')
 
@section('content')

<div>
    <h2>Deleted categories</h2>
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="upper-btn my-5 d-flex justify-content-end">
    <a href="/category" class="btn btn-primary">
        <div><i class="bi bi-arrow-left"></i>Category list</div>
    </a>
</div>

<div class="my-5 deleted-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($deletedCategories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td style="text-align: center">
                        <a href="category-restore/{{ $item->slug }}" class="btn btn-secondary col-3">
                            <i class="bi bi-arrow-counterclockwise"></i>Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection