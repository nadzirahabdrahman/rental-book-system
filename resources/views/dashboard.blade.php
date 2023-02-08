@extends('layouts.mainlayout')
 
@section('title', 'Dashboard')
 
@section('content')

<div>
    <h2>Hello, {{ Auth::user()->username }}</h2>
</div>

<div class="row my-5">
    <div class="col-lg-4">
        <div class="card-data book">
            <div class="row">
                <div class="col-6"><i class="bi bi-book-half"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class="card-desc">Books</div>
                    <div class="card-count">{{ $bookCount }}</div>
                </div>
            </div>
        </div>    
    </div>

    <div class="col-lg-4">
        <div class="card-data category">
            <div class="row">
                <div class="col-6"><i class="bi bi-card-list"></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class="card-desc">Categories</div>
                    <div class="card-count">{{ $categoryCount }}</div>
                </div>
            </div>
        </div>    
    </div>

    <div class="col-lg-4">
        <div class="card-data user">
            <div class="row">
                <div class="col-6"><i class="bi bi-people-fill"></i></i></div>
                <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                    <div class="card-desc">Users</div>
                    <div class="card-count">{{ $userCount }}</div>
                </div>
            </div>
        </div>    
    </div>
    {{-- <div class="col-lg-4">
        <div class="card-data">Category</div>
    </div>
    <div class="col-lg-4">
        <div class="card-data">User</div>
    </div> --}}
</div>

<div class="my-5">
    <h3>Rent log</h3>

    {{-- calling component rent-log-table, refer to resources/view/components file --}}
    <x-rent-log-table :rentlogs='$rentlogs'/>
</div>


@endsection