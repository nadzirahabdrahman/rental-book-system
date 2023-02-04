@extends('layouts.mainlayout')
 
@section('title', 'Registered Users')
 
@section('content')

<div>
    <h2>List of Registered Users</h2>
</div>

<div class="upper-btn my-5 d-flex justify-content-end">
    <a href="/user" class="btn btn-primary">
        <div><i class="bi bi-arrow-left"></i>List of Users</div>
    </a>
</div>

<div class="my-5 table-list">
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
            @foreach ($registeredUsers as $item)
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
                        <a style="color: white" href="/user-detail/{{ $item->slug }}" class="btn btn-info col-4">
                            <i class="bi bi-info-circle"></i>Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection