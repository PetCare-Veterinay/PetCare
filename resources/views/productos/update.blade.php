@extends('adminlte::page')
@section('title', 'Update')
@section('content')
   <br>
   <div class="box-tittle">
      <div class="color-bar"></div>
         <div class="textcontent">
            <h1>Actualizar Producto</h1>
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
                  <div class="card-header">Editar Producto</div>
                     <div class="card-body">
                        <form method="POST" action="{{ route('editproducto', ['id' => request('id')]) }}">
                           @csrf
                           @method('PUT')

                           <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $product->Nombre }}">
                           </div>

                           <div class="form-group">
                              <label for="name">Descripción</label>
                              <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ $product->Descripcion }}">
                           </div>

                           <div class="form-group">
                              <label for="name">Precio</label>
                              <input type="text" name="Precio" id="Precio" class="form-control" value="{{ $product->Precio }}">
                           </div>

                           <div class="form-group">
                              <label for="name">Stock</label>
                              <input type="text" name="Stock" id="Stock" class="form-control" value="{{ $product->Stock }}">
                           </div>

                           <!-- Agrega más campos para editar según tus necesidades -->

                           <button type="submit" class="btn btn-primary" onclick="successfully()">Actualizar Producto</button>
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
    var productId = {{ request('id') }}; // Obtener el valor de 'id' desde la URL
</script>

<script src="https://unpkg.com/sweetalert2@10"></script>
<script>
    function successfully() {
    Swal.fire({
        title: "¡Éxito!",
        text: "Producto actualizado exitosamente",
        icon: "success",
        timer: 2000,
        showConfirmButton: false,
    }).then(function () {
        // Realiza la redirección a tu página web
        window.location.href = "{{ route('listproducto') }}";
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
