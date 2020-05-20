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
                                            <div class="row m-0">
                                                <div class="col-lg-4 d-none d-lg-block text-center py-2">
                                                    <img src="/app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="300" height="230">
                                                </div>
                                                <div class="col-lg-8 col-md-12 bg-white px-4 pt-3">
                                                    <h4 class="mb-2 card-title">Verificación de correo</h4>
                                                    @if (session('resent'))
                                                        <div class="alert alert-success" role="alert">
                                                            <span class="text-white">Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.</span>
                                                        </div>
                                                    @endif
                                                    <p class="card-text mb-3">
                                                        Antes de continuar, revise su correo electrónico para verificar su correo. Si no recibió el correo electrónico, de click en reenviar.
                                                    </p>
                                                    <div class="fg-actions d-flex justify-content-between">
                                                        <div class="login-btn">
                                                            <a href="{{ route('login') }}" class="btn btn-outline-primary text-decoration-none">Iniciar sesión</a>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                                                @csrf
                                                                <button class="btn btn-primary" type="submit">
                                                                    Reenviar
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
