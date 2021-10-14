@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Mis Tareas') }}</div>

                <div class="card-body">
                    <a href=" {{route ('tareas.create') }} " class="btn btn-primary mb-3">Crear Nueva Tarea</a>

                    <table class="table table-sm">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Título</th>
                            <th scope="col">Fecha de Entrega</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td> {{ $task->title }} </td>
                            <td> {{ $task->deadline }} </td>
                            <td> {{ $task->description }} </td>
                            <td>
                                @if($task->is_complete == false)
                                <span class="badge bg-warning">Pendientes</span>
                                @else
                                <span class="badge bg-warning">Completada</span>
                                @endif
                            </td>
                            <td>
                                @if($task->is_complete == false)
                                <a href="{{ route('tareas.status' , $task->id)}}" 
                                    class="btn btn-outline-success btn-sm"><ion-icon name="checkmark-circle-outline"></ion-icon></a>
                                @endif
                                <a href=" {{ route('tareas.edit', $task->id) }} " 
                                    class="btn btn-outline-info btn-sm"><ion-icon name="create-outline"></ion-icon></a>

                                    <form method="POST" action="{{route ('tareas.destroy', 
                                        $task->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <button type="submit" class="btn btn-danger btn-sm"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>
                            </td>
                            </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
