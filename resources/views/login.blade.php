<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Book | Login</title>

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    
</head>

<style>

    .main {
        height: 100vh;
        box-sizing: border-box;
    }

    .login-box {
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

        @if(session('status'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
            
        @else
            
        @endif
        <div class="login-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username" 
                    id="username" required>
                </div>

                <div>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" 
                    id="password" required>
                </div>

                <div>
                    <button class="btn btn-primary form-control" type="submit" class="form-control">Login</button>
                </div>

                <div class="text-center">
                    Create an account?  <a href="signup">Sign up</a>
                </div>
            </form>

        </div>
    </div>
    
    {{-- JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
    crossorigin="anonymous"></script>
</body>
</html>