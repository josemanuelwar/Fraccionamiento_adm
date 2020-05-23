@include('plantillas.header')
<!-- BEGIN : Body-->
<body data-col="1-column" class=" 1-column  blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-wrapper"><!--Login Page Starts-->
                <section id="login">
                    <div class="container-fluid">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body login-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                                                    <img src="app-assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                                                </div>

                                                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                                                    <form method="POST" action="{{ route('login') }}" novalidate>
                                                        @csrf
                                                    <h4 class="mb-2 card-title">Iniciar sesión</h4>
                                                    <p class="card-text mb-3">
                                                        Bienvenido de nuevo, inicie sesión en su cuenta.
                                                    </p>
                                                        <div class="form-group mt-4">
                                                            <div class="controls mb-1">
                                                                <input type="email" name="email_us" required autofocus autocomplete="email"
                                                                       class="form-control @error('email_us') is-invalid @enderror"
                                                                       value="{{ old('email_us') }}"  placeholder="Correo"
                                                                       data-validation-required-message="Este campo es requerido"
                                                                        data-validation-email-message="Formato de no valido">
                                                                <div class="help-block">
                                                                    @error('email_us')
                                                                    <ul class="text-danger" role="alert">
                                                                       <li>{{ $message }}</li>
                                                                    </ul>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls mb-4">
                                                                <input type="password" name="password" required
                                                                       class="form-control @error('password') is-invalid @enderror"
                                                                        placeholder="Contraseña"
                                                                       data-validation-required-message="Este campo es requerido">

                                                                <div class="help-block">
                                                                    @error('password')
                                                                    <ul class="text-danger" role="alert">
                                                                        <li>{{ $message }}</li>
                                                                    </ul>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <div class="d-flex justify-content-between mt-2">
                                                        <div class="remember-me">
                                                            <div class="custom-control custom-checkbox custom-control-inline mb-3">
                                                                <input type="checkbox" id="remember" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} />
                                                                <label class="custom-control-label" for="remember">
                                                                    Recordarme
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="forgot-password-option">
                                                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">¿Olvidó contraseñá ?</a>
                                                        </div>
                                                    </div>
                                                    <div class="fg-actions d-flex justify-content-between">
                                                        <div class="login-btn">
                                                                <a href="{{route('register')}}" class="btn btn-outline-primary text-decoration-none">Registrarme</a>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                                                        </div>
                                                    </div>
{{--                                                    <hr class="m-0">--}}
{{--                                                    <div class="d-flex justify-content-between mt-3">--}}
{{--                                                        <div class="option-login">--}}
{{--                                                            <h6 class="text-decoration-none text-primary">Or Login With</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="social-login-options">--}}
{{--                                                            <a class="btn btn-social-icon mr-2 btn-facebook">--}}
{{--                                                                <span class="fa fa-facebook"></span>--}}
{{--                                                            </a>--}}
{{--                                                            <a class="btn btn-social-icon mr-2 btn-twitter">--}}
{{--                                                                <span class="fa fa-twitter"></span>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Login Page Ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('plantillas.footer')
