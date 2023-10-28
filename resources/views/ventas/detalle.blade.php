@extends('adminlte::page')
@section('title', 'Create')
@section('content')
   <br>
   <div class="box-title">
      <div class="color-bar"></div>
      <div class="text-content">
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
                           <label for="Nombre">Nombre</label>
                           <input id="Nombre" type="text" class="form-control @error('Nombre') is-invalid @enderror" name="Nombre" value="{{ old('Nombre') }}" required>
                           @error('Nombre')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="Descripcion">Descripción</label>
                           <input id="Descripcion" type="text" class="form-control @error('Descripcion') is-invalid @enderror" name="Descripcion" value="{{ old('Descripcion') }}" required>
                           @error('Descripcion')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="Precio">Precio</label>
                           <input id="Precio" type="text" class="form-control @error('Precio') is-invalid @enderror" name="Precio" value="{{ old('Precio') }}" required>
                           @error('Precio')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                           @enderror
                        </div>

                        <div class="form-group">
                           <label for="Stock">Stock</label>
                           <input id="Stock" type="text" class="form-control @error('Stock') is-invalid @enderror" name="Stock" value="{{ old('Stock') }}" required>
                           @error('Stock')
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
@endsection

@section('css')
   <link rel="stylesheet" href="/css/admin_custom.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
   </style>
@endsection
