@extends('adminlte::page')
@section('title', 'Create')
@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Crear Nuevo Usuario</h1>
        </div>
    </div>
    <br>
        <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
            <div class="container mt-5">
            <div class="alert-container">
                <!-- Aquí se mostrará la alerta -->
            </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Registro de Usuario</div>

                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('save') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Dirección de Correo Electrónico</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">Confirmar Contraseña</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="button" id="registerUser" class="btn btn-primary" onclick="successfully()">Registrar</button>

                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $("#registerUser").click(function() {
            var form = $("form");
            $.ajax({
                type: "POST",
                url: "{{ route('save') }}",
                data: form.serialize(),
                success: function(response) {
                    // Recargar la vista actual
                    $("#create-view-container").html(response);
                }
            });
        });
    });
</script>
<script src="https://unpkg.com/sweetalert2@10"></script>
<script>
    function successfully() {
    Swal.fire({
        title: "Success!",
        text: "User Create Successfully",
        icon: "success",
        timer: 2000,
        showConfirmButton: false,
    }).then(function () {
        // Realiza la redirección a tu página web
        window.location.href = "{{ route('list') }}";
    });
    }
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
@stop