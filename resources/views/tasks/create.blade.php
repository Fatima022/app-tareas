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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection