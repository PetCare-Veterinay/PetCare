<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Ventas y Detalle de Ventas</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Ventas y Detalle de Ventas</h1>
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
</body>
</html>