

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learning Management System | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.0.1') }}/dist/css/adminlte.min.css">
</head>

<body>

    @if(session('ubah'))
<div id="popupTrigger" data-toggle="modal" data-target="#exampleModal"></div>

<!-- Create the popup modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Coba Lagi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{ session('ubah')}}</p>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary active" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add JavaScript code to trigger the popup on page load -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('popupTrigger').click();
  });
</script>
@endif

<div class="hold-transition login-page">
    <div class="login-box mb-5">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h4"><b>Learning Management System</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input value="{{ @old('email') }}" name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input value="{{ @old('password') }}" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <!-- /.col -->
                        <div class="row mb-2">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <div id="break" class="text-center w-100 align-middle my-3">
                                or
                            </div>
                            <a href="{{ asset('auth/google') }}" class="btn btn-light btn-block">
                                <i class="fab fa-google"></i>
                                <span>Login with Google</span>
                            </a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-2">
                    <a href="">I forgot my password</a>
                    <a href="/" class="float-right">Home</a>
                <p>
                    <a href="{{ route('register') }}">Don't have an account? </a>
                </p>

                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('templates/backend/AdminLTE-3.0.1') }}/dist/js/adminlte.min.js"></script>
</body>

</html>
