@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="dashboard">
        <div class="dashboard__card">
            <div class="dashboard__body">
                <h3 class="dashboard__title">Tus Eventos</h3>
                <a href="{{ route('organizer.create') }}" class="btn btn-primary">Crear evento</a>
                @if ($events->isEmpty())
                    <p>No has creado ningún evento.</p>
                @else
                    <table class="dashboard__table">
                        <thead class="dashboard__table-header">
                            <tr>
                                <th class="dashboard__table-heading dashboard__table-heading--name">ID</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Nombre</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Descripción</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Categoría</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Fecha de Creación</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Imagen</th>
                                <th class="dashboard__table-heading dashboard__table-heading--name">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="dashboard__table-body">
                            @foreach ($events as $event)
                                <tr class="dashboard__table-row">
                                    <td class="dashboard__table-cell">{{ $event->id }}</td>
                                    <td class="dashboard__table-cell">{{ $event->name }}</td>
                                    <td class="dashboard__table-cell">{{ $event->description }}</td>
                                    <td class="dashboard__table-cell">{{ $event->category }}</td>
                                    <td class="dashboard__table-cell">{{ $event->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="dashboard__table-cell"><img src="{{ asset($event->image) }}" alt="Imagen del evento" width="200" height="200"></td>
                                    <td class="dashboard__table-cell">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection