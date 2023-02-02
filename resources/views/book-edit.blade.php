@extends('layouts.mainlayout')
 
@section('title', 'Edit book')
 
@section('content')
{{-- jQuery --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div>
    <h2>Edit book</h2>
</div>

<div class="my-5 col-8 m-auto">

    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

    </div>
        
    @endif

    <form action="/book-edit/{{ $books->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="book_code" class="form-label">Code</label>
            <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book code"
            value="{{ $books->book_code }}">
        </div>

        <div class="my-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Book title"
            value="{{ $books->title }}">
        </div>

        <div class="my-3">
            <label for="image" class="form-label" style="display: block">Selected image:</label>
            @if ($books->cover != '')
                <img src="{{ asset('storage/cover/'.$books->cover) }}" alt="" 
                width="120px">
            @else
                <img src="{{ asset('images/cover-not-available.jpg') }}" alt=""
                width="120px">
            @endif
            <input type="file" name="image" id="cover" class="form-control my-3" >
        </div>

        <div class="my-3">
            <label for="category" class="form-label">Selected category: 
                @foreach ($books->categories as $category)
                    {{ $category->name }} ,
                @endforeach
            </label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                    
                @endforeach
            </select>
        </div>

        <div class="my-3 edit-category-btn d-flex justify-content-center align-items-center">
            <button class="btn btn-success col-5" type="submit">Update</button>
            <a href="/book" class="btn btn-danger col-5">Cancel</a>
        </div>
        
    </form>

</div>

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>


@endsection