@extends('adminlte::page')
@section('title', 'Create')
@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Crear Nueva Venta</h1>
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
                            <div class="card-header">Registro de Ventas</div>

                            <div class="card-body">
                                
                                <form method="POST" action="{{ route('save') }}">
                                    @csrf


                        <div class="form-group">
                            <label for="tipo_factura">Tipo de Venta</label>
                            <select id="tipo_factura" name="tipo_factura" class="form-control">
                                <option value="Factura A">Producto</option>
                                <option value="Factura B">Servicio</option>
                            </select>
                        </div>

                        <div class="form-group">
                           <label for="fecha">Fecha:</label>
                           <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="Nit">Nit</label>
                            <textarea id="Nit" name="Nit" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Direccion">Direccion</label>
                            <textarea id="Direccion" name="Direccion" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Cantidad">Cantidad</label>
                            <textarea id="Cantidad" name="Cantidad" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Descripcion">Descripcion</label>
                            <textarea id="Descripcion" name="Descripcion" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Descripcion">Descripcion</label>
                            <textarea id="Descripcion" name="Descripcion" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Precio">Precio</label>
                            <textarea id="Precio" name="Precio" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="Total">Total</label>
                            <textarea id="Total" name="Total" class="form-control"></textarea>
                        </div>        

                        <button type="button" class="btn btn-primary">Generar Factura</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
   <script>
      $(document).ready(function() {
         $("#createVentas").click(function() {
            var form = $("form");
            $.ajax({
               type: "POST",
               url: "{{ route('saveventas') }}",
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
            text: "Factura creada exitosamente",
            icon: "success",
            timer: 2000,
            showConfirmButton: false,
         }).then(function() {
            // Realiza la redirección a tu página web
            window.location.href = "{{ route('listventas') }}";
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
