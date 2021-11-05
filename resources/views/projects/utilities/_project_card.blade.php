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
        @foreach ($project->users as $user)
		    <p>{{ $user->name }}</p>
		@endforeach
        <hr>

        <a href="" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#modalCrearTareas_{{$project->id}}">Crear Tarea</a>
        
        @foreach($project->tasks as $task)
            <div class="d-flex aling-items-center justify-content-between">
                <div style="width:60%;">
                    <p class="mb-0">{{ $task->title }}</p>
                    <p class="mb-0">Usuarios: {{ $task->user->name }}</p>

                    @if($task->is_complete == false)
                        <span class="badge bg-warning">Pendiente</span>
                        @else
                        <span class="badge bg-success">Completada</span>
                    @endif
                </div>

                <div>
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
                </div>
            </div>
        @endforeach
        <hr>
        <p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</p>
        <p class="mb-0">Creado el: {{ Carbon\Carbon::parse($project->created_at)->format('d M Y H:i') }}</p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCrearTareas_{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Crear Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form method="POST" action=" {{ route('tareas.store') }} ">
            {{csrf_field() }}

            <input type="hidden" name="source" value="proyectos" readonly="">
            <input type="hidden" name="project_id" value="{{ $project->id }}" readonly="">
            <input type="hidden" name="user_id" value="{{ $project->id }}" readonly="">

            <div class="modal-body">
                <div class="form-grpup">
                    <label>Titulo Tareas</label>
                    <input type="text" name="title" class="form-control" required="">
                </div>

                <div class="form-grpup">
                    <label>Fecha de Entrega</label>
                    <input type="date" name="deadline" class="form-control">
                </div>

                <div class="form-grpup">
                    <label>Descripcion</label>
                    <input name="description" class="form-control" row="5">
                </div>
                <div class="form-group">
				    <label for="SelectUserId">Selecciona usuario</label>
				    <select class="form-control" id="SelectUserId" name="user_id">
				    	@foreach($project->users as $user)
				            <option value="{{ $user->id }}">{{ $user->name }}</option>
				        @endforeach
				    </select>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Tarea</button>
            </div>
            </form>
        </div>
    </div>
</div>


            

