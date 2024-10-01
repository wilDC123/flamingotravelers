@extends('adminlte::page')
@section('title', 'Crear Reservación')
@section('content_header')
    <h1>Agregar Reservación</h1>
@stop
@section('content')
    <form action="{{route('reservations.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client_id">Nombre del cliente: </label>
                    <select name="client_id" id="client_id" class="form-control">
                        @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->first_name . ' ' . $client->last_name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="destination_id">Destino: </label>
                    <select name="destination_id" id="destination_id" class="form-control">
                        @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="package_id">Paquete turístico: </label>
                    <select name="package_id" id="package_id" class="form-control">
                        @foreach($packages as $package)
                        <option value="{{ $package->id }}">{{ $package->pack_name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="number_people">Cantidad de personas: </label>
                    <input type="number" id="number_people" name="number_people" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status">Estado: </label>
                    <select name="status" id="status" class="form-control" required>>
                        <option value="Reservado">Reservado</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Concluido">Concluido</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="start_date">Fecha de inicio: </label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="end_date">Fecha de finalización: </label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
            </div>
        </div>

        <a href="{{route('reservations.index')}}" class="btn btn-secondary">Volver</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop