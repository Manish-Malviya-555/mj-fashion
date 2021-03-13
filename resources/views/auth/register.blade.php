<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MJ-Fashion | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a  class="h1"><b>MJ-Fashion</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if($errors->any())
              <div class="alert alert-danger">
              <strong>Oops! There were some problems with your input.</strong>
              <ul>
                 @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
             </div>
      @endif
      <form method="POST" action="{{ route('register') }}">
        {{csrf_field()}}
        <div class="input-group mb-3">
          <input id="name" type="text" placeholder="Enter your Full name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input id="email" type="email" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input id="phone" type="number" placeholder="Enter your phone number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
        @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
              
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=" fas fa-phone"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input id="address" type="text" placeholder="Enter your residential address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">
        @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-plus"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-1">
          <label>{{ __('User Profile Image') }}</label>
        </div>

        <div class="input-group mb-3">
        <input id="photo" type="file" placeholder="Select your profile picture" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">
          
        </div>

        <div class="input-group mb-3">
        <input id="password" placeholder="create new Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
        <input id="password-confirm" placeholder="Retype password" type="password" class="form-control" name="password_confirmation">
        
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </div>
          <div class="input-group mb-1">
          <p class="mb-1">
                <a href="/login" class="text-center">already created account</a>
          </p>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
</html>
