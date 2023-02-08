<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Book | @yield('title')</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">

    {{-- include file style.css, refer to public folder --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>

    <div class="main d-flex flex-column justify-content-between">
        {{-- NAVBAR ON TOP --}}
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Book</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" 
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

    

        {{-- CONTENT BODY --}}
        <div class="content-body h-100">
            <div class="row g-0 h-100">

                {{-- NAV SIDE BAR --}}
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    
                    @if(Auth::user())

                        {{-- if USER is ADMIN, display menu sidebar --}}
                        @if(Auth::user()->role_id == 1)

                        {{-- request()->route()->uri : for current SIDE BAR MENU is clicked/displayed --}}
                        <a href="/dashboard" 
                        @if(request()->route()->uri == 'dashboard')
                            class="active"
                        @endif>Dashboard</a>

                        <a href="/book"
                        @if(request()->route()->uri == 'book' || 
                        request()->route()->uri == 'book-add' ||
                        request()->route()->uri == 'book-edit/{slug}' ||
                        request()->route()->uri == 'book-delete/{slug}' ||
                        request()->route()->uri == 'book-deleted-list' ||
                        request()->route()->uri == '/')
                            class="active"
                        @endif>Books</a>

                        <a href="/category"
                        @if(request()->route()->uri == 'category' || 
                        request()->route()->uri == 'category-add' ||
                        request()->route()->uri == 'category-edit/{slug}' ||
                        request()->route()->uri == 'category-delete/{slug}' ||
                        request()->route()->uri == 'category-deleted-list')
                            class="active"
                        @endif>Categories</a>

                        <a href="/book-rent" 
                        @if(request()->route()->uri == 'book-rent')
                            class="active"
                        @endif>Book Rent</a>

                        <a href="/book-return" 
                        @if(request()->route()->uri == 'book-return')
                            class="active"
                        @endif>Book Return</a>

                        <a href="/user" 
                        @if(request()->route()->uri == 'user' ||
                        request()->route()->uri == 'user-registered' ||
                        request()->route()->uri == 'user-detail/{slug}' ||
                        request()->route()->uri == 'user-approve/{slug}' ||
                        request()->route()->uri == 'user-delete/{slug}' ||
                        request()->route()->uri == 'user-deleted-list')
                            class="active"
                        @endif>Users</a>

                        <a href="/rent-log" 
                        @if(request()->route()->uri == 'rent-log')
                            class="active"
                        @endif>Rent Logs</a>

                        <a href="/logout" 
                        @if(request()->route()->uri == 'logout')
                            class="active"
                        @endif>Logout</a>

                        @else

                        {{-- if USER is CLIENT, display menu sidebar --}}
                        <a href="/profile" 
                        @if(request()->route()->uri == 'profile')
                            class="active"
                        @endif>Profile</a>

                        <a href="/" 
                        @if(request()->route()->uri == '/')
                            class="active"
                        @endif>Books</a>

                        <a href="logout">Logout</a>
                        @endif

                    @else
                        <a href="/login">Log In</a>

                    @endif
                </div>

                {{-- CONTENT BODY AT THE RIGHT SIDE --}}
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>

            </div>
        </div>


    </div>
    
    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
</body>
</html>