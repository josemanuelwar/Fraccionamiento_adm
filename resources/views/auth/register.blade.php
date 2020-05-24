@include('plantillas.header')
<!-- BEGIN : Body-->
<body data-col="1-column" class=" 1-column  blank-page">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-wrapper"><!--Registration Page Starts-->
                <section id="regestration">
                    <div class="container-fluid">
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body register-img">
                                            <div class="row m-0">
                                                <div class="col-lg-1 d-none d-lg-block  text-center bg-primary">
                                                    <div style="width: 450px"></div>
                                                </div>
                                                <div class="col-lg-11 col-md-12 px-4 pt-3 bg-white">
                                                    <form method="POST" action="{{ route('register') }}" novalidate>
                                                        @csrf
                                                        <input type="hidden" value="{{ $role->ID_ROL }}" name="rol_us">
                                                    <h4 class="card-title mb-2">Crear cuenta</h4>
                                                    <p class="card-text mb-3">
                                                        Complete el siguiente formulario.
                                                    </p>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="text" name="nick_us" required autocomplete="nickname"
                                                                   class="form-control @error('nick_us') is-invalid @enderror"
                                                                   value="{{ old('nick_us') }}"  placeholder="Apodo"
                                                                   data-validation-required-message="Este campo es requerido">
                                                            <div class="help-block">
                                                                @error('nick_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="text" name="nombre_us" required  autocomplete="nombre"
                                                                   class="form-control @error('nombre_us') is-invalid @enderror"
                                                                   value="{{ old('nombre_us') }}"  placeholder="Nombre"
                                                                   data-validation-required-message="Este campo es requerido">
                                                            <div class="help-block">
                                                                @error('nombre_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="text" name="app_us" required  autocomplete="apellido_paterno"
                                                                   class="form-control @error('app_us') is-invalid @enderror"
                                                                   value="{{ old('app_us') }}"  placeholder="Apellido paterno"
                                                                   data-validation-required-message="Este campo es requerido">
                                                            <div class="help-block">
                                                                @error('app_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="text" name="apm_us" required  autocomplete="apellido_materno"
                                                                   class="form-control @error('apm_us') is-invalid @enderror"
                                                                   value="{{ old('apm_us') }}"  placeholder="Apellido materno"
                                                                   data-validation-required-message="Este campo es requerido">
                                                            <div class="help-block">
                                                                @error('apm_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="text" name="rfc_us" required  autocomplete="rfc"
                                                                   class="form-control @error('rfc_us') is-invalid @enderror"
                                                                   value="{{ old('rfc_us') }}"  placeholder="RFC"
                                                                   data-validation-required-message="Este campo es requerido">
                                                            <div class="help-block">
                                                                @error('rfc_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="email" name="email_us" required  autocomplete="email"
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
                                                    <div class="form-group ">
                                                        <div class="controls mb-1">
                                                            <input type="password" name="contrasena_us" required
                                                                   class="form-control @error('contrasena_us') is-invalid @enderror"
                                                                   placeholder="Contraseña"
                                                                   maxlength="16" minlength="8"
                                                                   data-validation-required-message="Este campo es requerido"
                                                                   data-validation-minlength-message="Debe ser entre 8 a 16 caracteres">

                                                            <div class="help-block">
                                                                @error('contrasena_us')
                                                                <ul class="text-danger" role="alert">
                                                                    <li>{{ $message }}</li>
                                                                </ul>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="controls mb-4">
                                                            <input type="password" name="contrasena_us_confirmation" required
                                                                   class="form-control @error('contrasena_us_confirmation') is-invalid @enderror"
                                                                    placeholder="Confirmar contraseña"
                                                                   data-validation-required-message="Este campo es requerido"
                                                                   data-validation-match-message="No coincide contraseña"
                                                                   data-validation-match-match="contrasena_us">
                                                        </div>
                                                    </div>

{{--                                                    <div class="custom-control custom-checkbox custom-control-inline mb-3">--}}
{{--                                                        <input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input"--}}
{{--                                                               checked />--}}
{{--                                                        <label class="custom-control-label" for="customCheckboxInline1">--}}
{{--                                                            I accept the terms & conditions.--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
                                                    <div class="fg-actions d-flex justify-content-between">
                                                        <div class="login-btn">
                                                            <a href="{{ route('login') }}" class="btn btn-outline-primary text-decoration-none">
                                                            Iniciar sesión
                                                            </a>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <button class="btn btn-primary" type="submit">Registrar </button>
                                                        </div>
                                                    </div>
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
                <!--Registration Page Ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('plantillas.footer')
