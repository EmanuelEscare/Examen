@extends('layouts.layout')
@section('content')
<br>
<br>
<br>

<div class="card shadow-sm">
    <br>
    <div class="container">
        <h1>Modificar tarea "#{{$tarea->id}} {{$tarea->nombre}}"</h1>
      <div class="cardDinamic">
        <br>
        <br>

        @if (Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}} 
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
        <form action="{{route('modificarTarea')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}@if(!old('nombre')){{$tarea->nombre}}@endif" name="nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea cols="30" rows="10" class="form-control form-control-lg" name="descripcion">{{old('descripcion')}}@if(!old('descripcion')){{$tarea->descripcion}}@endif
                </textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha inicio</label>
                <input type="date" class="form-control form-control-lg" value="{{old('fechaInicio')}}@if(!old('fechaInicio')){{$tarea->fechaInicio}}@endif" name="fechaInicio">
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha fin</label>
                <input type="date" class="form-control form-control-lg" value="{{old('fechaFin')}}@if(!old('fechaFin')){{$tarea->fechaFin}}@endif" name="fechaFin">
            </div>

            <input type="hidden" name="id" value="{{$tarea->id}}">





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