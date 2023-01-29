<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Book | Sign Up</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">

</head>

<style>
    .main {
        height: 100vh;

    }

    .signup-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }

    form div {
        margin-bottom: 15px;
    }

</style>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">

        @if ($errors->any())
        <div class="alert alert-danger " style="width: 500px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if(session('status'))
        <div class="alert alert-success" style="width: 500px">
            {{ session('message') }}
        </div>
            
        @endif

    <div class="signup-box">

        {{-- REGISTRATION PROCESS is execute on REGISTER PAGE only --}}
        <form action="" method="post">
            @csrf
            <div>
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username">
            </div>

            <div>
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>

            <div>
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone">
            </div>

            <div>
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" rows="5" type="text" name="address" id="address" required></textarea>
            </div>

            <div>
                <button class="btn btn-primary form-control" type="submit" class="form-control">Sign Up</button>
            </div>

            <div class="text-center">
                Have an account?  <a href="login">Login</a>
            </div>

    </div>
    </div>
        </form>



    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>

</body>

</body>
</html>