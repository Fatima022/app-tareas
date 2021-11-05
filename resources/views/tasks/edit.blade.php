@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">EDITAR TAREA</div>

                <div class="card-body">
                    <form method="POST" action="{{route ('tareas.update', 
                        $task->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="">Título de tarea</label>
                            <input type="text" name="title" class="form-control" 
                            value="{{ $task->title }}" required="">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Fecha de Entrega</label>
                            <input type="date" name="deadline" class="form-control"
                             value="{{ $task->deadline }}">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea name="description" class="form-control" rows="5">
                                {{ $task->description }}
                            </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="SelectUserId">Selecciona usuario</label>
                            <select class="form-control" id="SelectUserId" name="user_id" multiple="">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('tareas.index') }}" class="btn btn-outline-dark">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection