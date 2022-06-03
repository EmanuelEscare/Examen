@extends('layouts.layout')
@section('content')
<br>
<br>
<br>

<div class="card shadow-sm">
    <br>
    <div class="container">
        <h1>Agregar usuario</h1>
        <br>
        <br>

        @if (Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}}
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
        <form action="{{route('agregarUsuario')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">
                
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control form-control-lg" value="{{old('email')}}" name="email">
              
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Contraseña</label>
              <input type="password" class="form-control form-control-lg" name="contraseña">
              
            </div>

            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar usuario</button>
            </div>
        </form>

    </div>
    <br>
</div>
<br>
@endsection