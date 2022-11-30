<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buroq Transport&nbsp;|&nbsp;Apps</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{url('template/img/images/logo.png')}}" rel="icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<style>
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
  <div class="container d-flex flex-column">

    <div class="row align-items-center justify-content-center
    min-vh-90">
    <div class="col-12 col-md-8 col-lg-6">
     <img src="{{url('template/img/images/logo.png')}}" class="rounded mx-auto d-block"
     style="margin-top: 70px;">
     <div class="card shadow-sm mt-3">
      <div class="card-body">
        <h5 class="text-center">Masukan email dan password anda</h5>
        <hr>
        <form action="{{url('/reset/password/post')}}" class="form" method="post">
          @csrf
          <input type="hidden" name="token" value="{{$token}}">
          <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <input type="password" id="password" class="form-control" name="password" required autofocus>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Konfirmasi</label>

            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
            @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif

          </div>


          <div class="form-group row {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
            <div class="col-md-8">
             {!! NoCaptcha::display() !!}
             {!! NoCaptcha::renderJs() !!}
             @if ($errors->has('g-recaptcha-response'))
             <span class="help-block text-danger">
              <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="mb-3 d-grid mt-2">
          <button class="btn btn text-white btn-lg btn-block" type="submit" 
          style="background: #05AE51;">
          <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i></div>
          <div class="hide-text">Kirim&nbsp;<i class="bi bi-send-check"></i></div>
        </button>
      </div>
      
    </form>
  </div>
</div>
</div>
</div>
</div>
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