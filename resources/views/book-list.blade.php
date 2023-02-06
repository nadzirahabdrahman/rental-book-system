@extends('layouts.mainlayout')
 
@section('title', 'Book')
 
@section('content')

<div>
    <h2>Books</h2>
</div>

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