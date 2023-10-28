@extends('adminlte::page')
@section('title', 'Create')
@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Crear Nuevo Cliente</h1>
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
                            <div class="card-header">Registro de Cliente</div>

                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('vistaCliente') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="Nombre">Nombre</label>
                                        <input id="Nombre" type="text" class="form-control @error('Nombre') is-invalid @enderror" name="Nombre" value="{{ old('Nombre') }}" required autocomplete="Nombre" autofocus>
                                        @error('Nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Apellido">Apellido</label>
                                        <input id="Apellido" type="text" class="form-control @error('Apellido') is-invalid @enderror" name="Apellido" value="{{ old('Apellido') }}" required autocomplete="Apellido" autofocus>
                                        @error('Apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Telefono">Telefono</label>
                                        <input id="Telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror" name="Telefono" value="{{ old('Telefono') }}" required autocomplete="Telefono" autofocus>
                                        @error('Telefono')
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
                                        <label for="Direccion">Direccion</label>
                                        <input id="Direccion" type="text" class="form-control @error('Direccion') is-invalid @enderror" name="Direccion" value="{{ old('Direccion') }}" required autocomplete="Direccion" autofocus>
                                        @error('Direccion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="button" id="registerClient" class="btn btn-primary" onclick="successfully()">Registrar</button>

                                   
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
        $("#registerClient").click(function() {
            var form = $("form");
            $.ajax({
                type: "POST",
                url: "{{ route('vistaCliente') }}",
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
        window.location.href = "{{ route('Cliente') }}";
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
