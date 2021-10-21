@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-end">
            <a href="" class="btn btn-primary"
            data-bs-toggle="modal" data-bs-target="#exampleModal"
            >Crear Nuevo Proyecto</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4>Mis Proyectos</h4>
            <hr>
        </div>
        @foreach($projects as $project)
        <div class="col-md-4">
            @include('projects.utilities._project_card')
        </div>
        @endforeach
    </div>
</div>

@include('projects.utilities._create_modal')
@endsection