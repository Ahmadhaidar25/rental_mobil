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
  <title>Register</title>
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
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-8 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                     <p class="text-center text-secondary"><strong>saya sudah punya akun</strong>&nbsp;<a href="{{url('/')}}" style="text-decoration: none; color: #05AE51;"><strong>Login kembali</strong></a></p>
                  </div>
                  <hr>
                  <div class="table-responsive">
                  <form class="form" action="{{url('/register/akun')}}" method="post">
                   @csrf
                   <input type="hidden" name="pengguna_id" value="0">
                   <div class="form-group">
                    <label>Nama Lengkap<span class="text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" autofocus value="{{old('nama')}}">

                    @if($errors->has('nama'))
                    <span class="invalid-feedback">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email@gmail.com" value="{{old('email')}}">

                    @if($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>No Telepon<span class="text-danger">*</span></label>
                    <input type="number" class="form-control {{ $errors->has('no_tlp') ? ' is-invalid' : '' }}" name="no_tlp" placeholder="0812xxxxxxxx" 
                    value="{{old('no_tlp')}}">
                    @if($errors->has('no_tlp'))
                    <span class="invalid-feedback">{{ $errors->first('no_tlp') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="********" 
                    value="{{old('password')}}">
                    @if($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                  </div>

                  <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                   
                     {!! NoCaptcha::display() !!}
                     {!! NoCaptcha::renderJs() !!}
                     @if ($errors->has('g-recaptcha-response'))
                     <span class="help-block text-danger">
                      <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                
                </div>

                <div class="form-group">
                 <input type="hidden" name="role" value="3">
               </div>
               <input type="hidden" name="status" value="1">
               <div class="form-group">
                 <button class="btn btn text-white btn-lg btn-block" type="submit" style="background: #05AE51;">
                  <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i></div>
                  <div class="hide-text">Daftar</div>
                </button>
              </div>
              

            </form>
            </div>
            <hr>
           
            <div class="text-center">
            </div>
          </div>
        </div>
      </div>
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