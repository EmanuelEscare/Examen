@if (count($tareas))
@foreach ($tareas as $tarea)

<tr>
    <th scope="row">{{$tarea->id}}</th>
    <td>{{$tarea->nombre}}</td>
    <td>{{$tarea->descripcion}}</td>
    <td>{{$tarea->usuarios->name}}</td>
    <td>{{$tarea->fechaInicio}}</td>
    <td>{{$tarea->fechaFin}}</td>
    <td>
        <div class="d-grid gap-2">
        <a href="{{route('modificarTareaVista',$tarea->id)}}" class="btn btn-secondary btn-lg"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
    </td>
    <td>
        <div class="d-grid gap-2">
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$tarea->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>
  </tr>

@endforeach


@foreach ($tareas as $tarea)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$tarea->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar tarea</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar la tarea "{{$tarea->nombre}}"?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarTarea',$tarea->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif