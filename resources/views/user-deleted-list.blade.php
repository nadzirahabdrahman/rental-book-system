@extends('layouts.mainlayout')
 
@section('title', 'Deleted users')
 
@section('content')

<div>
    <h2>Deleted users</h2>
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="upper-btn my-5 d-flex justify-content-end">
    <a href="/user" class="btn btn-primary">
        <div><i class="bi bi-arrow-left"></i>User list</div>
    </a>
</div>

<div class="my-5 deleted-list">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th style="text-align: center">Phone</th>
                <th style="text-align: center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($deletedUsers as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td style="text-align: center">
                        @if($item->phone )
                            {{ $item->phone }}
                        
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align: center">
                        <a href="user-restore/{{ $item->slug }}" class="btn btn-secondary col-4">
                            <i class="bi bi-arrow-counterclockwise"></i>Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection