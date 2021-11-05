@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">CREAR TAREA</div>

                <div class="card-body">
                    <form method="POST" action="{{route ('tareas.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Título de tarea</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Fecha de Entrega</label>
                            <input type="date" name="deadline" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Descripción</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Seleccionar usuario</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <a href=" {{route ('tareas.index') }} " class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agregar</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection