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
                                            <form method="POST" action="{{ route('password.email') }}" novalidate>
                                                @csrf
                                            <div class="row m-0">
                                                <div class="col-lg-4 d-none d-lg-block text-center py-2">
                                                    <img src="/app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-8 col-md-12 bg-white px-4 pt-3">
                                                    <h4 class="mb-2 card-title">Recuperar contraseña</h4>
                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            <span class="text-white">{{ session('status') }}</span>
                                                        </div>
                                                    @endif
                                                    <p class="card-text mb-3">
                                                        Ingrese su dirección de correo electrónico y le enviaremos instrucciones sobre cómo restablecer su contraseña.
                                                    </p>
                                                    <div class="form-group mt-4">
                                                        <div class="controls mb-4">
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
                                                    <div class="fg-actions d-flex justify-content-between">
                                                        <div class="login-btn">
                                                            <button class="btn btn-outline-primary">
                                                                <a href="{{ route('login') }}" class="text-decoration-none">Iniciar sesión</a>
                                                            </button>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <button class="btn btn-primary" type="submit">
                                                                Recuperar
                                                            </button>
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


