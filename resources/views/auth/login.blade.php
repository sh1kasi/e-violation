{{-- @extends('layouts.app')

@section('content')


<div class="row d-flex justify-content-center">
    <div class="col-md-4 d-flex flex-column justify-content-center" style="height: 90vh">

            <div class="title row text-center">
                <div class="h1 fw-bold">E-Violation</div>
                <span class="small">SMK NEGERI 1 SURABAYA</span>
            </div>
            <div class="body ms-5 me-5 row mt-4">
                <form action="{{ route('login') }}" method="post">
                @csrf
                    <div class="form-group">
                        <input id="email" type="email" placeholder="Email" class="form-control border-2 border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <input id="password" placeholder="Password" type="password" class="form-control border-2 border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="my-3 text-center">
                        Don't have any account? <a href="{{ route('register') }}">Register Here</a>
                    </div>
                    <div class="submit">
                        <button class="btn w-100 btn-primary rounded-pill" type="submit">{{ __('Login') }}</button>
                    </div>
                </form>
            </div>
    </div>

</div>

@endsection --}}


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/login') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/login') }}/css/style.css">

    <title>Login #2</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('assets/login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h1><strong>E-Violation</strong></h1>
            <p class="mb-4">SMK NEGERI 1 SURABAYA</p>
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-group first">
                <label for="email">Email</label>
                <input id="email" type="email" placeholder="Email" class="form-control border-2 border-dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input id="password" placeholder="Password" type="password" class="form-control border-2 border-dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              </div>
              
              <div class="mb-3 align-items-center text-center">
                <span class="ml-auto">Don't have any account? <a href="#" class="register">Register Here</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="{{ asset('assets/login') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/login') }}/js/popper.min.js"></script>
    <script src="{{ asset('assets/login') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/login') }}/js/main.js"></script>
  </body>
</html>
