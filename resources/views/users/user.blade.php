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
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
        </div>
        <button class="btn btn-primary">Agregar</button>
    </div>
    
    <!-- Lista de Datos -->
    <div class="box">
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><ul id="name"></ul></td>
                        <td>johndoe@example.com</td>
                        <td>
                            <button class="btn btn-info">Editar</button>
                            <button class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Puedes agregar más filas de datos aquí -->
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
                const username = document.getElementById('name');
                data.forEach(user => {
                    const li = document.createElement('li');
                    li.textContent = user.name; 
                    username.appendChild(li);
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