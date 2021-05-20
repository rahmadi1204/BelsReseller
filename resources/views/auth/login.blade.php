@include('layouts.head')
<style>
    .loginBG {
        background-image: url('{{ asset('dist/img/bg.png') }}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

</style>

<body class="hold-transition login-page loginBG">

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img height="150px" src="{{ asset('dist/img/belsLogo.png') }}" alt=""></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg ">BelsReseller</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group ">
                        <input name="username" type="text" class="form-control" placeholder="Username"
                            value="{{ $oldUsername ?? '' }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user text-info"></span>
                            </div>
                        </div>
                    </div>
                    @error('username')
                        <div class="text-danger text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group my-3">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-info"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-outline-info btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('/') }}dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/') }}plugins/sweetalert2/sweetalert2.min.js"></script>
    <x-alert></x-alert>

</body>

</html>
