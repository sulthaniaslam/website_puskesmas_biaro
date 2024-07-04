<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Website Puskesmas Lasi | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSS --}}
    @include('includes.backend.css')
    {{-- CSS --}}

    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* background-color: #FF6000; */
            /* background: linear-gradient(90deg, hsla(259, 84%, 78%, 1) 0%, hsla(206, 67%, 75%, 1) 100%); */
            background: linear-gradient(to bottom right, #FFE6C7, #FF6000);
            /* background-image: linear-gradient(to bottom right, #FFE6C7, #FF6000); */
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 500px;
            max-width: 90%;
            text-align: center;
        }

        .login-card-msg {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group-text {
            background-color: transparent;
            border: none;
        }

        .input-group-text .fas {
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #E0A75E;
            border: none;
        }

        .btn-primary:hover {
            background-color: #F9D689;
            color: black
        }

        .mb-5 {
            margin-bottom: 2rem;
        }

        .forgot-password {
            text-align: right;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .container {
            width: 50%;
        }
    </style>
</head>

<body class="hold-transition login-page">

    {{-- script --}}
    @include('includes.backend.script')
    {{-- script --}}
    <div class="container">
        @if (session()->has('cek'))
        <div class="alert alert-danger">
            {{ session('cek') }}
        </div>

        @elseif(session()->has('blokir'))
        <div class="alert alert-danger">
            {{ session('blokir') }}
        </div>

        @elseif(session()->has('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>

        @endif
    </div>
    <div class="login-card">
        <p class="login-card-msg">Masuk ke Akun Anda</p>
        <form action="{{ route('proses_login') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="col-6 mb-5">
                <button type="submit" class="btn btn-primary btn-block mb-2">Masuk</button>
                <a href="{{ route('/') }}">Home</a>
            </div>
            <div class="forgot-password">

                <a href="">Lupa Password?</a>
            </div>
    </div>
    </form>
    </div>

</body>

</html>