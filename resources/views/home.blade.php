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

    <div class="content" style="background-color: #fff; border: 2px solid #fff; padding: 35px;">
        <div class="container mt-5">
			<div class="container-calendar">
				<div class="panel panel-primary">
					<div class="panel-heading">
						CITAS 
					</div>
					<div class="panel-body" >
						<div id='calendar'></div>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop

@section('js')

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

	<script>
		$(document).ready(function () {
			var calendar = $('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
					},
					navLinks: true,
					editable: true,
					events: "getevent",           
					displayEventTime: false,
					eventRender: function (event, element, view) {
						if (event.allDay === 'true') {
							event.allDay = true;
						} else {
							event.allDay = false;
						}
					},
			selectable: true,
			selectHelper: true,
			select: function (start, end, allDay) {
					var title = prompt('Event Title:');
					if (title) {
						var start = moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD'); 
						var end = moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD'); 
						$.ajax({ 
							url: "{{ URL::to('createevent') }}",
							data: 'title=' + title + '&start=' + start + '&end=' + end +'&_token=' +"{{ csrf_token() }}",
							type: "post",
							success: function (data) {
									alert("Added Successfully");
									$('#calendar').fullCalendar('refetchEvents');
							}
						});
					}
			},
			eventClick: function (event) {
					var deleteMsg = confirm("Do you really want to delete?");
					if (deleteMsg) { 
						$.ajax({
							type: "POST",
							url: "{{ URL::to('deleteevent') }}",
							data: "&id=" + event.id+'&_token=' +"{{ csrf_token() }}",
							success: function (response) {
									if(parseInt(response) > 0) {
										$('#calendar').fullCalendar('removeEvents', event.id);
										alert("Deleted Successfully");
									}
							}
						});
					}
			}
			});
		});
	</script>

@stop

@section('css')
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.cs' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
	<link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,500;0,700;1,400;1,500&family=Roboto+Condensed:wght@300;700&family=Roboto:wght@300&display=swap" rel="stylesheet">
@stop