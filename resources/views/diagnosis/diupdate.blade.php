@extends('adminlte::page')
@section('title', 'Update')
@section('content')
   <br>
   <div class="box-tittle">
      <div class="color-bar"></div>
         <div class="textcontent">
            <h1>Actualizar Diagnostico</h1>
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
                  <div class="card-header">Editar Usuario</div>
                     <div class="card-body">
                        <form method="POST" action="{{ route('Diedit', ['id' => request('id')]) }}">
                           @csrf
                           @method('PUT')

                           <div class="form-group">
                              <label for="Vacunas">Vacunas</label>
                              <input type="text" name="Vacunas" id="Vacunas" class="form-control" value="{{ $diagnostico->Vacunas }}">
                           </div>

                           <div class="form-group">
                              <label for="Examenes_Laboratorio">Examenes_Laboratorio</label>
                              <input type="text" name="Examenes_Laboratorio" id="Examenes_Laboratorio" class="form-control" value="{{ $diagnostico->Examenes_Laboratorio }}">
                           </div>

                           <div class="form-group">
                              <label for="Precio">Recomendaciones</label>
                              <input type="text" name="Recomendaciones" id="Recomendaciones" class="form-control" value="{{ $diagnostico->Recomendaciones}}">
                           </div>

                           <div class="form-group">
                              <label for="Plan_Seguimiento">Plan_Seguimiento</label>
                              <input type="text" name="Plan_Seguimiento" id="Plan_Seguimiento" class="form-control" value="{{ $diagnostico->Plan_Seguimiento}}">
                           </div>

                           <div class="form-group">
                              <label for="Enfermedades">Enfermedades</label>
                              <input type="text" name="Enfermedades" id="Enfermedades" class="form-control" value="{{ $diagnostico->Enfermedades }}">
                           </div>

                  

                           <!-- Agrega más campos para editar según tus necesidades -->

                           <button type="submit" class="btn btn-primary" onclick="successfully()">Actualizar Usuario</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection

@section('js')
<script>
    var userId = {{ request('id') }}; // Obtener el valor de 'id' desde la URL
</script>

<script src="https://unpkg.com/sweetalert2@10"></script>
<script>
    function successfully() {
    Swal.fire({
        title: "Success!",
        text: "User Updated Successfully",
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