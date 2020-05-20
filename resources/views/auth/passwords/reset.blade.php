@include('plantillas.header')
<!-- BEGIN : Body-->
<body data-col="1-column" class=" 1-column  blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-wrapper"><!--Forgot Password Starts-->
                <section id="forgot-password">
                    <div class="container-fluid forgot-password-bg">
                        <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
                            <div class="col-md-7 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body fg-image">
                                            <form method="POST" action="{{ route('password.update') }}">
                                                @csrf

                                                <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="row m-0">
                                                <div class="col-lg-4 d-none d-lg-block text-center py-2 ">
                                                    <img src="/app-assets/img/gallery/forgot.png" alt="" class="img-fluid pt-5" width="300" height="230">
                                                </div>
                                                <div class="col-lg-8 col-md-12 bg-white px-4 pt-3">
                                                    <h4 class="mb-2 card-title">Restablecer contraseña</h4>
                                                    <p class="card-text mb-3">
                                                        Complete el siguiente formulario
                                                    </p>

                                                    <div class="form-group mt-4">
                                                        <div class="controls mb-1">
                                                            <input type="email" name="email_us" required autocomplete="email" readonly
                                                                   class="form-control @error('email_us') is-invalid @enderror"
                                                                   value="{{$email ?? old('email_us') }}" >

                                                            <div class="help-block">
                                                                @error('email')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="password" name="password" required
                                                                   class="form-control @error('password') is-invalid @enderror"
                                                                   placeholder="Contraseña"
                                                                   maxlength="16" minlength="8"
                                                                   data-validation-required-message="Este campo es requerido"
                                                                   data-validation-minlength-message="Debe ser entre 8 a 16 caracteres">

                                                            <div class="help-block">
                                                                @error('password')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-4">
                                                            <input type="password" name="password_confirmation" required
                                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                   placeholder="Confirmar contraseña"
                                                                   data-validation-required-message="Este campo es requerido"
                                                                   data-validation-match-message="No coincide contraseña"
                                                                   data-validation-match-match="password">
                                                        </div>
                                                    </div>
                                                    <div class="fg-actions d-flex justify-content-between">
                                                        <div class="login-btn">
                                                                <a href="{{ route('login') }}" class="btn btn-outline-primary text-decoration-none">Iniciar sesión</a>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <button class="btn btn-primary" type="submit">Restablecer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Forgot Password Ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

@include('plantillas.footer')
