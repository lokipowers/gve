
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                <div class="card col-lg-4 mx-auto">
                    <div class="card-body px-5 py-5">
                        <h3 class="card-title text-left mb-3">{{ __('Login') }}</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group @error('email') has-danger @enderror">
                                <label>{{ __('Username or Email Address') }} *</label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control p_input @error('email') form-control-danger @enderror">
                                @error('email')
                                    <label id="email-error" class="error mt-2 text-danger" for="email">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group @error('password') has-danger @enderror">
                                <label>{{ __('Password') }} *</label>
                                <input id="password" type="password" class="form-control p_input @error('password') form-control-danger @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <label id="password-error" class="error mt-2 text-danger" for="password">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }} </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Login') }}</button>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-facebook mr-2 col">
                                    <i class="mdi mdi-facebook"></i> Facebook </button>
                                <button class="btn btn-google col">
                                    <i class="mdi mdi-google-plus"></i> Google plus </button>
                            </div>
                            <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/vendors/js/vendor.bundle.base.js"></script>
<script src="/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<!--
<script src="/js/off-canvas.js"></script>
<script src="/js/hoverable-collapse.js"></script>
<script src="/js/misc.js"></script>
<script src="/js/settings.js"></script>
<script src="/js/todolist.js"></script>
-->
<script src="/js/app.js"></script>
<!-- endinject -->
</body>
</html>
