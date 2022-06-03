@extends('layouts.layout')
@section('content')
<br>
<br>
<br>

<div class="card shadow-sm">
    <br>
    <div class="container">
      <h1>Tareas</h1>
      <div class="cardDinamic">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <input class="form-control form-control-lg" type="text" id="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
        </div>
        <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                 Se elimino con exito la tarea.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col">Fecha de vencimiento</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">
                  @include('pages.tareas')
              </tbody>
              </table>
        </div>

        <br>
        {!! $tareas->links() !!}

    </div>
</div>
    <br>
</div>
<br>
<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/tareas/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
</script>
@endsection