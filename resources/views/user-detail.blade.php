@extends('layouts.mainlayout')
 
@section('title', 'User detail')
 
@section('content')

<div>
    <h2>Detail user : {{ $users->username }}</h2>
</div>

<div class="upper-btn my-5 d-flex justify-content-end">
    @if($users->status == 'inactive')
    <a href="/user-approve/{{ $users->slug }}" class="btn btn-success">
        <div><i class="bi bi-check-lg"></i>Approve user</div>
    </a>
    @else
    <a href="/user" class="btn btn-primary">
        <div><i class="bi bi-arrow-left"></i>List of Users</div>
    </a>
    @endif
    
</div>

@if(session('status'))
<div class="my-5 alert alert-success">
    {{ session('status') }}
</div>  
@endif

<div class="my-5">
    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <td>{{ $users->username }}</td>
        </tr>

        <tr>
            <th>Phone</th>
            <td>
                @if($users->phone )
                    {{ $users->phone }}
                
                @else
                    -
                @endif
            </td>
        </tr>

        <tr>
            <th>Address</th>
            <td>{{ $users->address }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{ $users->status }}</td>
        </tr>
    </table>

</div>

@endsection