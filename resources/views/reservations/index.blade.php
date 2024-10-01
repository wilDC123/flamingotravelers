@extends('adminlte::page')
@section('title', 'Reservaciones')
@section('content_header')
    <h1>Reservaciones</h1>
@stop
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{route('reservations.create')}}" class="btn btn-primary">Agregar Reservación</a>
    <form action="{{ route('reservations.index') }}" method="GET" class="form-inline ml-auto">
        <div class="input-group">
            <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar reservación..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-secondary btn-sm" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </div>
    </form>
</div>
    <table class="table table-bordered mt-12">
        <thead>
            <th width="30px">ID</th>
            <th>Paquete turístico</th>
            <th>Destino</th>
            <th>Nombre del cliente</th>
            <th>Estado</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{$reservation->id}}</td>
                    <td>{{$reservation->package->pack_name}}</td>
                    <td>{{$reservation->destination->name}}</td>
                    <td>{{$reservation->client->first_name . ' ' . $reservation->client->last_name}}</td>
                    <td>{{$reservation->status}}</td>
                    <td>{{$reservation->start_date}}</td>
                    <td>{{$reservation->end_date}}</td>
                    <td>
                        <a href="{{route('reservations.edit', $reservation)}}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{route('reservations.show', $reservation)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{route('reservations.destroy', $reservation->id)}}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar esta reservación?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
