@extends('adminlte::page')

@section('title', 'Home')

@section('content')
    <br>
    <div class="box-tittle">
        <div class="color-bar"></div>
            <div class="textcontent">
                <h1>Dashboard</h1>
            </div>
        </div>
    <br>
    <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">5</span>
                                    <h3 class="box-title">Citas del día</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_6.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">Q. </span>
                                    <h3 class="box-title">Ventas del día</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_3.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">Q. </span>
                                    <h3 class="box-title">Ventas del Mes</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_3.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <br>
            <div class="row">


                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">4</span>
                                    <h3 class="box-title">Doctores</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_4.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">17</span>
                                    <h3 class="box-title">Clientes</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_2.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box box-primary button-rectangle">
                        <div class="box-header with-border">
                            <div class="box-content">
                                <div class="text-content">
                                    <span class="number">25</span>
                                    <h3 class="box-title">Pacientes</h3>
                                </div>
                                <div class="icon">
                                    <img src="{{ asset('img/Asset_5.svg') }}" alt="Icono" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop