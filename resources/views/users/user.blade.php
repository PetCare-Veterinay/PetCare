@extends('adminlte::page')

@section('title', 'Users')

@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
            <div class="textcontent">
                <h1>Lista de Usuarios</h1>
            </div>
        </div>
    <br>
    
    <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
    <!-- Buscador y Botón de Agregar -->
    <div class="d-flex justify-content-between mb-3">
    <div class="form-group flex-grow-1 mr-2">
        <input type="text" class="form-control" placeholder="Buscar">
    </div>
        <button class="btn btn-primary large_buttom"> + Agregar</button>
    </div>
    
    <!-- Lista de Datos -->
    <div class="box">
        <div class="box-body">
                 <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
    </div>
</div>

@stop
    
@section('js')
    <script>
        fetch('/api/users') 
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('table tbody');

                data.forEach(user => {
                    const row = document.createElement('tr');
                    
                    // Crear celdas para ID, Nombre y Email
                    const idCell = document.createElement('td');
                    idCell.textContent = user.id;
                    
                    const nameCell = document.createElement('td');
                    nameCell.textContent = user.name;
                    
                    const emailCell = document.createElement('td');
                    emailCell.textContent = user.email;
                    
                    // Crear celda para los botones de "Editar" y "Eliminar"
                    const actionsCell = document.createElement('td');
                    const editButton = document.createElement('button');
                    editButton.className = 'btn btn-info';
                    editButton.textContent = 'Editar';
                    
                    // Agregar un espacio entre los botones
                    const space = document.createTextNode('  ');
                    
                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'btn btn-danger';
                    deleteButton.textContent = 'Eliminar';
                    
                    actionsCell.appendChild(editButton);
                    actionsCell.appendChild(space);
                    actionsCell.appendChild(deleteButton);
                    
                    // Agregar las celdas a la fila de la tabla
                    row.appendChild(idCell);
                    row.appendChild(nameCell);
                    row.appendChild(emailCell);
                    row.appendChild(actionsCell);
                    
                    // Agregar la fila a la tabla
                    tableBody.appendChild(row);
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