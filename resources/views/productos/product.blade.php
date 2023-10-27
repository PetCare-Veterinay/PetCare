@extends('adminlte::page')
@section('title', 'Producto')
@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
        <div class="textcontent">
            <h1>Lista de Productos</h1>
        </div>
    </div>
    <br>
    <!-- Contenido de los detalles del producto -->
<div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
        <!-- Buscador y Botón de Agregar -->
        <div class="d-flex justify-content-between mb-3">
            <div class="form-group flex-grow-1 mr-2">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <a href="{{ route('createproducto') }}" id="load-create-view" class="btn btn-primary large_button"> + Agregar</a>
        </div>
    <div class="box">
            <div class="box-body">
                <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="Col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDelete" onclick="successfully()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
fetch('/api/producto')
.then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('table tbody');

            data.forEach(user => {
                const row = document.createElement('tr');

                // Crear celdas para id, name, email, accion
                const idCell = document.createElement('td');
                idCell.textContent = user.id;

                const NombreCell = document.createElement('td');
                NombreCell.textContent = user.Nombre;

                const DescripcionCell = document.createElement('td');
                DescripcionCell.textContent = user.Descripcion; 

                const PrecioCell = document.createElement('td');
                PrecioCell.textContent = user.Precio;
                
                const StockCell = document.createElement('td');
                StockCell.textContent = user.Stock; 

                // Crear celda para los botones de "Editar" y "Eliminar"
                const actionsCell = document.createElement('td');
                const editButton = document.createElement('button');
                editButton.className = 'btn btn-info';
                editButton.textContent = 'Editar';

                // Agregar manejador de clic para redireccionar
                editButton.addEventListener('click', () => {
                const id = user.id;
                window.location.href = `/products-update/${user.id}`; 
                });

                actionsCell.appendChild(editButton);
                const space = document.createTextNode('  ');

                const deleteButton = document.createElement('button');
                deleteButton.className = 'btn btn-danger';
                deleteButton.textContent = 'Eliminar';

                // Almacena la URL de eliminación en un atributo personalizado
                deleteButton.setAttribute('data-delete', `api/producto/${user.id}`);

                // Agregar un evento de clic al botón "Eliminar" que abre el modal de confirmación
                deleteButton.addEventListener('click', function () {
                // Almacenar la URL de eliminación en una variable
                const deleteUrl = deleteButton.getAttribute('data-delete');

                $('#deleteModal').modal('show');

                // Agregar un evento de clic al botón de confirmación dentro del modal
                document.getElementById('confirmDelete').addEventListener('click', function () {
                // Realiza una solicitud DELETE a la URL de eliminación
                fetch(deleteUrl, {
                method: 'delete',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            
            .then(response => response.json())
            .then(data => {
                
                console.log(data.message); 
            })
            .catch(error => {
                console.error('Error al eliminar al usuario:', error);
            });

        // Cierra el modal de confirmación
        $('#deleteModal').modal('hide');
    });
});

actionsCell.appendChild(editButton);
actionsCell.appendChild(space);
actionsCell.appendChild(deleteButton);

// Agregar las celdas a la fila de la tabla
row.appendChild(idCell);
row.appendChild(NombreCell);
row.appendChild(DescripcionCell);
row.appendChild(PrecioCell);
row.appendChild(StockCell);
row.appendChild(actionsCell);

// Agregar la fila a la tabla
tableBody.appendChild(row);

            });
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
        window.location.href = "{{ route('listproducto') }}";
    });
    }
</script>
<script>
        $(document).ready(function() {
            $("#load-create-view").click(function() {
                // Realizar una petición AJAX para cargar la vista de creación
                $.get("{{ route('createproducto') }}", function(data) {
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
                $.get("{{ route('createproducto') }}", function(data) {
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
@stop