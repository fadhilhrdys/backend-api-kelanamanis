<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/auth.css" />
    <!-- Bootstrap 4 links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- end -->
    <title>{{ $title }} | Kelana Manis</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center">
                <img class="logo" src="asset/img/logo.png" alt="kelana manis">

                {{-- flash data error login --}}
                @if(session()->has('errLogin'))
                <div class="alert alert-danger fade show mt-3" role="alert">
                    {{ session('errLogin') }}
                </div>
                @endif

                <h2 class="text-center pt-4 pb-3 title">Sign in to <b>Dashboard</b></h2>
                <!-- form login -->
                <form class="form-login col-4 py-3" action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control col py-2 @error('username') is-invalid @enderror" type="username"
                            id="username" name="username" placeholder="enter ur username" autofocus required
                            value="{{ old('username') }}">
                        {{-- message error validation --}}
                        @error('username')
                        <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control col py-2" type="password" id="password" name="password" required>
                    </div>
                    <button class="col mt-2 py-2 rounded btn-login" type="submit">Sign In Please</button>
                </form>
            </div>
        </div>
    </div>
    <!-- script -->

</body>

</html>