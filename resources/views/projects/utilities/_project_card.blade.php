<div class="card mb-3">
    @if($project->status == 'En Proceso')
    <div class="text-white text-center px-2 bg-info">{{ $project->status }}</div>
    @endif

    @if($project->status == 'Terminado')
    <div class="text-white text-center px-2 bg-success">{{ $project->status }}</div>
    @endif

    @if($project->status == 'Atrasado')
    <div class="text-white text-center px-2 bg-warning">{{ $project->status }}</div>
    @endif

    @if($project->status == 'Cancelado')
    <div class="text-white text-center px-2 bg-danger">{{ $project->status }}</div>
    @endif

    <div class="card-body">
        <h5> {{ $project->name }} </h5>
        <h7>{{ $project->description }}</h7>
        <hr>
        <a href="" class="btn btn-outline-dark btn-sm">Crear Tarea</a>
        
        @foreach($project->tasks as $task)
            <p class="mb-0">{{ $task->title }}</p>
            <p>Terminar para: {{ $task->deadline }}</p>
        @endforeach
        <hr>
        <p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</p>
        <p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>
    </div>
</div>

