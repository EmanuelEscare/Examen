@extends('layouts.layout')
@section('content')
<br>
<br>
<br>

<div class="card shadow-sm">
    <br>
    <div class="container">
        <h1>Agregar tarea a "{{$usuario->name}}"</h1>
      <div class="cardDinamic">

        <br>
        <br>

        @if (Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}} "{{$usuario->email}}"
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        @if (Session::has('errorx'))
        <div class="alert alert-danger  alert-dismissible fade show" role="alert">
            {{Session::get('errorx')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
        @endif
        <form action="{{route('agregarTarea')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea cols="30" rows="10" class="form-control form-control-lg" name="descripcion">
                    {{old('descripcion')}}
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha inicio</label>
                <input type="date" class="form-control form-control-lg" value="{{old('fechaInicio')}}" name="fechaInicio">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha fin</label>
                <input type="date" class="form-control form-control-lg" value="{{old('fechaFin')}}" name="fechaFin">
            </div>

            <input type="hidden" name="id" value="{{$usuario->id}}">





            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar tarea</button>
            </div>
        </form>
    </div>
    </div>
    <br>
</div>
<br>
@endsection