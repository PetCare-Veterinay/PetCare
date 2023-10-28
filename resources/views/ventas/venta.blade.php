@extends('adminlte::page')
@section('title', 'Venta')
@section('content')
        <br>
        <div class="box-tittle">
            <div class="color-bar"></div>
            <div class="textcontent">
                <h1>Formulario de Ventas y Detalle de Ventas</h1>
            </div>
        </div>
        <br>
        <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
            <div class="container mt-5">
            <div class="alert-container">
                <!-- Aquí se mostrará la alerta -->
            </div>
            <div class="containerr">
               
                <form id="ventaForm">
                    <div class="form-group">
                        <label for="fecha">Fecha de la venta</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" id="cliente" name="cliente" required>
                            <option value="">Seleccionar cliente</option>
                            <option value="cliente1">Juan Pérez</option>
                            <!-- Agrega más opciones de clientes según sea necesario -->
                        </select>
                    </div>

                    <h2>Detalle de Ventas</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="detalleVenta">
                            <!-- Aquí se agregarán los productos y servicios -->
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" id="agregarProducto">Agregar Producto</button>
                    <button type="button" class="btn btn-success" id="agregarServicio">Agregar Servicio</button>

                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Venta</button>
                </form>
            </div>
            </div>
        </div>

    
</body>
</html>
@stop

@section('js')
<!-- Incluye Bootstrap JS, jQuery y Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JavaScript para agregar productos y servicios al detalle de venta
        $(document).ready(function () {
            let total = 0;

            $("#agregarProducto").click(function () {
                const newRow = `<tr>
                    <td><input type="number" class="form-control" name="cantidadProducto[]"></td>
                    <td><input type="text" class="form-control" name="descripcionProducto[]"></td>
                    <td><input type="number" class="form-control" name="precioProducto[]"></td>
                    <td><button type="button" class="btn btn-danger eliminarFila">Eliminar</button></td>
                </tr>`;
                $("#detalleVenta").append(newRow);
            });

            $("#agregarServicio").click(function () {
                const newRow = `<tr>
                    <td><input type="number" class="form-control" name="cantidadServicio[]"></td>
                    <td><input type="text" class="form-control" name="descripcionServicio[]"></td>
                    <td><input type="number" class="form-control" name="precioServicio[]"></td>
                    <td><button type="button" class="btn btn-danger eliminarFila">Eliminar</button></td>
                </tr>`;
                $("#detalleVenta").append(newRow);
            });

            // Eliminar fila del detalle de venta
            $("#detalleVenta").on("click", ".eliminarFila", function () {
                $(this).closest("tr").remove();
                calcularTotal();
            });

            // Calcular el total
            function calcularTotal() {
                total = 0;
                $("input[name^='precioProducto'], input[name^='precioServicio']").each(function () {
                    const precio = parseFloat($(this).val()) || 0;
                    total += precio;
                });
                $("#total").val(total);
            }

            // Actualizar el total al cambiar los valores de los precios
            $("#detalleVenta").on("change", "input[name^='precioProducto'], input[name^='precioServicio']", calcularTotal);
        });
    </script>
<script src="https://unpkg.com/sweetalert2@10"></script>
<script>
    function successfully() {
    Swal.fire({
        title: "Success!",
        text: "User Delete Successfully",
        icon: "success",
        timer: 2000,
        showConfirmButton: false,
    }).then(function () {
        // Realiza la redirección a tu página web
        window.location.href = "{{ route('listventas') }}";
    });
    }
</script>
<script>
        $(document).ready(function() {
            $("#load-create-view").click(function() {
                // Realizar una petición AJAX para cargar la vista de creación
                $.get("{{ route('createventas') }}", function(data) {
                    // Insertar la vista de creación en el contenedor
                    $("#create-view-container").html(data);
                });
            });
        });
</script>
<script>
        $(document).ready(function() {
            $("#load-update-view").click(function() {
                // Realizar una petición AJAX para cargar la vista de creación
                $.get("{{ route('createventas') }}", function(data) {
                    // Insertar la vista de creación en el contenedor
                    $("#update-view-container").html(data);
                });
            });
        });
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
@stop