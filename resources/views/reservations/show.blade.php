@extends('adminlte::page')
@section('title', 'Detalle de la Reservación')
@section('content_header')
    <h1>Detalle de la Reservación</h1>
@stop
@section('content')
    <div>
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Reserva a nombre de: {{ $reservation->client->first_name . ' ' . $reservation->client->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Paquete turístico: </strong>{{ $reservation->package->pack_name }}</p>
            <p><strong>Destino: </strong>{{ $reservation->destination->name }}</p>
            <p><strong>Cantidad de personas: </strong>{{ $reservation->number_people }}</p>
            <p><strong>Estado: </strong>{{ $reservation->status }}</p>
            <p><strong>Fecha de inicio: </strong>{{ $reservation->start_date }}</p>
            <p><strong>Fecha de finalización: </strong>{{ $reservation->end_date }}</p>
        </div>
        <div class="card-footer">
            <a href="{{route('reservations.index')}}" class="btn btn-secondary">Volver</a>
            <a href="{{route('reservations.edit', $reservation)}}" class="btn btn-primary">Modificar</a>
            <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar esta reservación?')">Eliminar</button>
            </form>
        </div>
    </div>
@stop