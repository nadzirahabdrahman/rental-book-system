@extends('layouts.mainlayout')
 
@section('title', 'Book')
 
@section('content')

<form action="" method="get">
    <div class="row">
        <div class="col-12 col-sm-6">
            <select name="category" id="category" class="form-control">
                <option value="">Select category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="col-12 col-sm-6">
            <div class="input-group mb-3">
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's title">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </div>

</form>


<div class="my-5">
    <div class="row">
{{-- -------------------------------------------------------------------------------------------------------------- --}}
        @foreach ($books as $item)
        <div class="mb-3 col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100">
                <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : 
                                asset('images/cover-not-available.jpg') }}" class="card-img-top" 
                                alt="..." draggable="false">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ $item->book_code }}</p>
                    <p class="card-text">{{ $item->book_code }}</p>
                    <p class="fw-bold card-text text-end 
                        {{ $item->status == 'In stock' ? 'text-success' : 'text-danger' }}">
                        {{ $item->status }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection