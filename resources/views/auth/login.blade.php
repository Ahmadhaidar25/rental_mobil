<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <link href="{{url('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template/img/images/logo.png')}}" rel="icon">
  <link href="{{url('template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template/css/ruang-admin.min.css')}}" rel="stylesheet">
  <title>Login</title>
</head>

<style>
  .bg-image-vertical {
    position: relative;
    overflow: hidden;
    background-repeat: no-repeat;
    background-position: right center;
    background-size: auto 100%;
  }

  @media (min-width: 1025px) {
    .h-custom-2 {
      height: 100%;
    }
  }

  .spinner {
    display: none;
  }

  .preloader {

    position: fixed;

    top: 0;

    left: 0;

    width: 100%;

    height: 100%;

    z-index: 9999;

    background-color: #fff;

  }

  .preloader .loading {

    position: absolute;

    left: 50%;

    top: 50%;

    transform: translate(-50%, -50%);

    font: 14px arial;

  }
</style>
<body>
  <div class="preloader">

    <div class="loading">

      <img src="{{url('template/img/images/logo.png')}}" alt="" class="img-fluid" style="width: 80px;">
      <div class="text-center mt-2">
        <div class="spinner-border" role="status">
        </div>
      </div>
    </div>
  </div>
  <section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #012F2F;"></i>
            <span class="h1 fw-bold mb-0">Log in</span>


          </div>

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form class="form" style="width: 23rem;" action="{{url('/post/auth')}}" method="POST">
              @csrf
              
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example18">Email</label>
                <input type="email" name="email" class="form-control form-control-lg 
                {{ $errors->has('email') ? ' is-invalid' : '' }}" autofocus autocomplete="off" 
                value="{{old('email')}}">
                @if($errors->has('email'))
                <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example28">Password</label>
                <input type="password" name="password" class="form-control form-control-lg 
                {{ $errors->has('password') ? ' is-invalid' : '' }}">
                @if($errors->has('password'))
                <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
              </div>

              <div class="form-group row {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6">
                 {!! NoCaptcha::display() !!}
                 {!! NoCaptcha::renderJs() !!}
                 @if ($errors->has('g-recaptcha-response'))
                 <span class="help-block text-danger">
                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="pt-1 mb-4">
              <button class="btn btn text-white btn-lg btn-block" type="submit" style="background: #05AE51;">
                <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i></div>
                <div class="hide-text">Login</div>
              </button>
            </div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="{{url('/lupa/password')}}">Lupa password?</a></p>
            <p>Belum punya akun? <a href="{{url('register')}}" class="link-info">Daftar</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="{{url('template/img/images/login.png')}}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

</body>
<script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
  (function () {
    $('.form').on('submit', function () {
      $('.button-prevent').attr('disabled', 'true');
      $('.spinner').show();
      $('.hide-text').hide();
    })
  })();

  $(document).ready(function () {
    $(".preloader").fadeOut(1000);

  })
</script>
@include('sweetalert::alert')
</html>