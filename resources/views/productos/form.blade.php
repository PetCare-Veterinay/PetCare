@extends('adminlte::page')
@section('title', 'Create')
@section('content')
   <br>
   <div class="box-tittle">
      <div class="color-bar"></div>
         <div class="textcontent">
            <h1>Crear Nuevo Producto</h1>
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
                  <div class="card-header">Registro de Producto</div>
                  <div class="card-body">
                     <form method="POST" action="{{ route('saveproducto') }}">
                        @csrf
                       
                        <div class="form-group">
                           <label for="name">Nombre</label>
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                           @error('name')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="description">Descripción</label>
                           <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>
                           @error('description')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="price">Precio</label>
                           <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                           @error('price')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="quantity">Cantidad</label>
                           <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required>
                           @error('quantity')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <button type="button" id="createProduct" class="btn btn-primary" onclick="successfully()">Registrar Producto</button>

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('js')
<script>
   $(document).ready(function() {
      $("#createProduct").click(function() {
         var form = $("form");
         $.ajax({
            type: "POST",
            url: "{{ route('saveproducto') }}",
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
         title: "¡Éxito!",
         text: "Producto creado exitosamente",
         icon: "success",
         timer: 2000,
         showConfirmButton: false,
      }).then(function() {
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
</style>
@stop
