<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
</head>
<body class="zysac-body">
    <div class="row zysac-row">
        <div class="col-lg-2 zysac-col zysac-col-left">
            <nav class="navbar bg-white zysac-nav-left-top">
                <div class="container-fluid">
                  <a class="navbar-brand titleE" href="#">Examen</a>
                </div>
              </nav>
              <div class="shadow zysac-nav-left">
                
                <ul class="list-group list-group-flush">
                  <a href="{{route('usuarios')}}" class="list-group-item">
                    <i class="fa-solid fa-user-group"></i>
                    Usuarios
                  </a>
                  <a href="{{route('tareas')}}" class="list-group-item">
                    <i class="fa-solid fa-laptop-file"></i>
                    Tareas
                  </a>
                </ul>

                
                <p class="version">Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
              </div>
        </div>
        {{-- ------------------------------------------ --}}
        <div class="col-lg-10 zysac-col">
            <nav class="navbar navbar-expand-lg bg-white zysac-shadow">
                <div class="container-fluid">
                  <button class="navbar-toggler mobilee" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                      <li class="nav-item">
                        <a class="nav-link active namee">Emanuel Escareño Covarrubias</a>
                      </li>
                      

                    </ul>
                    <form class="d-flex" role="search">
                      {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                      {{-- <a class="btn btn-outline-danger outboton" href=""><i class="fa-solid fa-right-from-bracket"></i></a> --}}
                    </form>
                  </div>
                </div>
              </nav>

              <div class="container">

                @section('content')

                @show

              </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>