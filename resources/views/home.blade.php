@extends('adminlte::page')

@section('title', 'Panel de Administración')

@section('content_header')
    <h1>Panel de Administración de Flamingo Travelers</h1>
@stop

@section('content')
    <div class="row">
        <!-- Sección de Bienvenida -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-light">
                    <h5 class="card-title">Bienvenido al Panel de Administración</h5>
                    <p class="card-text">Aquí puedes gestionar clientes, destinos, paquetes turísticos y reservaciones de manera eficiente.</p>
                </div>
            </div>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Clientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="/clients" class="small-box-footer">Ver Clientes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>20</h3>
                    <p>Destinos Disponibles</p>
                </div>
                <div class="icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <a href="/destinations" class="small-box-footer">Ver Destinos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>30</h3>
                    <p>Paquetes Turísticos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="/packages" class="small-box-footer">Ver Paquetes <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>50</h3>
                    <p>Reservaciones Activas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="/reservations" class="small-box-footer">Ver Reservaciones <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Gráfico de actividades (ejemplo) -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Actividad Reciente</h3>
                </div>
                <div class="card-body">
                    <p>Aquí puedes incluir gráficos o tablas que muestren la actividad reciente, como reservas realizadas, clientes nuevos, etc.</p>
                    <!-- Puedes utilizar bibliotecas como Chart.js o Google Charts para los gráficos -->
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Añadir estilos personalizados aquí si lo necesitas */
    </style>
@stop

@section('js')
    <script> console.log("Bienvenido al panel de administración de turismo"); </script>
@stop
