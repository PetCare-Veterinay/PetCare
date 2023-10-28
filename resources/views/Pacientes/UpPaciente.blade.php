este si es el mero bueno @extends('adminlte::page')
@section('title', 'Update')
@section('content')
   <br>
   <div class="box-tittle">
      <div class="color-bar"></div>
         <div class="textcontent">
            <h1>Actualizar Paciente</h1>
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
                  <div class="card-header">Editar Cliente</div>
                     <div class="card-body">
                     <form method="POST" action="{{ route('edit.Paciente', ['id' => $paciente->id]) }}">

                           @csrf
                           @method('PUT')

                           <div class="form-group">
                              <label for="Nombre">Nombre</label>
                              <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $paciente->Nombre }}">
                           </div>
                           <div class="form-group">
                              <label for="Especie">Especie</label>
                              <input type="text" name="Especie" id="Especie" class="form-control" value="{{ $paciente->Especie }}">
                           </div>
                           <div class="form-group">
                              <label for="Raza">Raza</label>
                              <input type="text" name="Raza" id="Raza" class="form-control" value="{{ $paciente->Raza }}">
                           </div>

                           <div class="form-group">
                              <label for="Fecha_de_nacimiento">Fecha_de_nacimiento</label>
                              <input type="date" name="Fecha_de_nacimiento" id="Fecha_de_nacimiento" class="form-control" value="{{ $paciente->Fecha_de_nacimiento }}">
                           </div>
                           <div class="form-group">
                              <label for="Genero">Genero</label>
                              <input type="text" name="Genero" id="Genero" class="form-control" value="{{ $paciente->Genero }}">
                           </div>
                           <select name="idCliente" class="form-control">
                              <div class="dropdown">
                                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Clientes
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach($clientes as $client) 
                                    <option value="{{$client->id}}">
                                       {{$client->id}} - {{ $client->Nombre}}
                                    </option>
                                    @endforeach
                                 </div>
                              </div>
                           </select>



                           <!-- Agrega más campos para editar según tus necesidades -->
                           <div>
                           <button type="submit" class="btn btn-primary mt-4 white " onclick="successfully()">Actualizar Cliente</button>
                           </div>
                           
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