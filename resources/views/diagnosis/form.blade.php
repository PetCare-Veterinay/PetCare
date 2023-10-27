@extends('adminlte::page')
@section('title', 'Create')
@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Crear Nuevo Diagnostico</h1>
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
                            <div class="card-header">Registro de Diagnostico</div>

                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('Guardado') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="Vacunas">Vacunas</label>
                                        <input id="Vacunas" type="text" class="form-control @error('Vacunas') is-invalid @enderror" name="Vacunas" value="{{ old('Vacunas') }}" required autocomplete="Vacunas" autofocus>
                                        @error('Vacunas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Examenes_Laboratorio">Examenes_Laboratorio</label>
                                        <input id="Examenes_Laboratorio" type="text" class="form-control @error('Examenes_Laboratorio') is-invalid @enderror" name="Examenes_Laboratorio" value="{{ old('Examenes_Laboratorio') }}" required autocomplete="Examenes_Laboratorio" autofocus>
                                        @error('Examenes_Laboratorio')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Recomendaciones">Recomendaciones</label>
                                        <input id="Recomendaciones" type="text" class="form-control @error('Recomendaciones') is-invalid @enderror" name="Recomendaciones" value="{{ old('Recomendaciones') }}" required autocomplete="Recomendaciones" autofocus>
                                        @error('Recomendaciones')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Plan_Seguimiento">Plan_Seguimiento</label>
                                        <input id="Plan_Seguimiento" type="text" class="form-control @error('Plan_Seguimiento') is-invalid @enderror" name="Plan_Seguimiento" value="{{ old('Plan_Seguimiento') }}" required autocomplete="Plan_Seguimiento" autofocus>
                                        @error('Plan_Seguimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Enfermedades">Enfermedades</label>
                                        <input id="Enfermedades" type="text" class="form-control @error('Enfermedades') is-invalid @enderror" name="Enfermedades" value="{{ old('Enfermedades') }}" required autocomplete="Enfermedades" autofocus>
                                        @error('Recomendaciones')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Recomendaciones">Recomendaciones</label>
                                        <input id="Recomendaciones" type="text" class="form-control @error('Recomendaciones') is-invalid @enderror" name="Recomendaciones" value="{{ old('Recomendaciones') }}" required autocomplete="Recomendaciones" autofocus>
                                        @error('Recomendaciones')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="">idTratamiento</label>
                                        <input id="idTratamiento" type="text" class="form-control @error('idTratamiento') is-invalid @enderror" name="idTratamiento" value="{{ old('idTratamiento') }}" required autocomplete="idTratamiento" autofocus>
                                        @error('idTratamiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="button" id="registerDiagnosis" class="btn btn-primary" onclick="successfully()">Registrar</button>

                                   
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
        $("#registerDiagnosis").click(function() {
            var form = $("form");
            $.ajax({
                type: "POST",
                url: "{{ route('DiGuardado') }}",
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
        window.location.href = "{{ route('Dilistar') }}";
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