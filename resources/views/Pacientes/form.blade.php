@extends('adminlte::page')
@section('title', 'Create')
@section('content')

    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Crear Nuevo Pacientes</h1>
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
                            <div class="card-header">Registro de Paciente</div>

                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('pacienteCreado') }}">
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
                                        <label for="Especie">Especie</label>
                                        <input id="Especie" type="text" class="form-control @error('Especie') is-invalid @enderror" name="Especie" value="{{ old('Especie') }}" required autocomplete="Especie" autofocus>
                                        @error('Especie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Raza">Raza</label>
                                        <input id="Raza" type="text" class="form-control @error('Raza') is-invalid @enderror" name="Raza" value="{{ old('Raza') }}" required autocomplete="Raza" autofocus>
                                        @error('Raza')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Fecha_de_nacimiento">Fecha_de_nacimiento</label>
                                        <input id="Fecha_de_nacimiento" type="date" class="form-control @error('Fecha_de_nacimiento') is-invalid @enderror" name="Fecha_de_nacimiento" value="{{ old('Fecha_de_nacimiento') }}" required autocomplete="Fecha_de_nacimiento">

                                        @error('Fecha_de_nacimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Genero">Genero</label>
                                        <input id="Genero" type="text" class="form-control @error('Genero') is-invalid @enderror" name="Genero" value="{{ old('Genero') }}" required autocomplete="Genero" autofocus>
                                        @error('Genero')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="idCliente">idCliente</label>
                                        <input id="idCliente" type="text" class="form-control @error('idCliente') is-invalid @enderror" name="idCliente" value="{{ old('idCliente') }}" required autocomplete="idCliente" autofocus>
                                        @error('idCliente')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="button" id="registerPaciente" class="btn btn-primary" onclick="successfully()">Registrar</button>
                                   
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
        $("#registerPaciente").click(function() {
            var form = $("form");
            $.ajax({
                type: "POST",
                url: "{{ route('pacienteCreado') }}",
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
        window.location.href = "{{ route('Paciente.General') }}";
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
