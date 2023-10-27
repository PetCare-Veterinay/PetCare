@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
            <div class="textcontent">
                <h1>Pacientes</h1>
            </div>
        </div>
    <br>
    
    <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
    <!-- Buscador y Botón de Agregar -->
    <div class="d-flex justify-content-between mb-3">
        <div class="form-group flex-grow-1 mr-2">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <a href="{{ route('Up.Paciente') }}" id="load-create-view" class="btn btn-primary large_button"> + Agregar</a>
    </div>
    
    <!-- Lista de Datos -->
    <div class="box">
        <div class="box-body">
                 <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Especie</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Fecha_de_Nacimiento</th>
                        <th scope="col">Genero</th>
                        <th scope="col">id_Cliente</th>
                        <th scope="col">Acciones</th>
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
        <p>¿Estás seguro de que deseas eliminar este cliente?</p>
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
fetch('/api/paciente')
    .then(response => response.json())
    .then(data => {
        const tableBody = document.querySelector('table tbody');

        data.forEach(user => {
            const row = document.createElement('tr');

            // Crear celdas para ID, Nombre, Especie, Raza, Fecha de Nacimiento, Genero, id Cliente
            const idCell = document.createElement('td');
            idCell.textContent = user.id;

            const NombreCell = document.createElement('td');
            NombreCell.textContent = user.Nombre;

            const EspecieCell = document.createElement('td');
            EspecieCell.textContent = user.Especie;

            const RazaCell = document.createElement('td');
            RazaCell.textContent = user.Raza;

            const Fecha_de_nacimientoCell = document.createElement('td');
            Fecha_de_nacimientoCell.textContent = user.Fecha_de_nacimiento;

            const GeneroCell = document.createElement('td');
            GeneroCell.textContent = user.Genero;

            const idClienteCell = document.createElement('td');
            idClienteCell.textContent = user.idCliente;

            // Crear celda para los botones de "Editar" y "Eliminar"
            const actionsCell = document.createElement('td');

            const editButton = document.createElement('button');
            editButton.className = 'btn btn-info';
            editButton.textContent = 'Editar';

            // Agregar manejador de clic para redireccionar
            editButton.addEventListener('click', () => {
                const id = user.id;
                window.location.href = `/PacienteEditado/${user.id}`;
            });

            actionsCell.appendChild(editButton);
            const space = document.createTextNode('  ');

            const deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger';
            deleteButton.textContent = 'Eliminar';

            // Almacena la URL de eliminación en un atributo personalizado
            deleteButton.setAttribute('data-delete', `api/paciente/${user.id}`);

            actionsCell.appendChild(space);
            actionsCell.appendChild(deleteButton);

            row.appendChild(idCell);
            row.appendChild(NombreCell);
            row.appendChild(EspecieCell);
            row.appendChild(RazaCell);
            row.appendChild(Fecha_de_nacimientoCell);
            row.appendChild(GeneroCell);
            row.appendChild(idClienteCell);
            row.appendChild(actionsCell);

            // Agregar la fila a la tabla
            tableBody.appendChild(row);
        });

        // Después de agregar todas las filas, ahora puedes adjuntar los manejadores de clic
        const deleteButtons = document.querySelectorAll('.btn-danger');

        deleteButtons.forEach(deleteButton => {
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
                        window.location.href = "{{ route('Paciente.General') }}";
                    })

                    .catch(error => {
                        console.error('Error al eliminar el Paciente:', error);
                    });

                    // Cierra el modal de confirmación
                    $('#deleteModal').modal('hide');
                });
            });
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