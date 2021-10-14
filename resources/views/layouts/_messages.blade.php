@if(Session::has('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Atención!</strong> {{ Session::get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('alert'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>¡Alerta!</strong> {{ Session::get('alert') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('exito'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>¡Acción Exitosa!</strong> {{ Session::get('exito') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
