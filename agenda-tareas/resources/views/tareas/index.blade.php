@extends("index")

@section("contenido")
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <article class="col-md-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <i class="fa-solid fa-puzzle-piece"></i> Crear nueva tarea
          </div>
          <div class="card-body">
            <form action="{{route('agregar_tarea')}}" method="POST">
              @csrf

              @error("tarea")
                <h6 class="alert alert-danger">{{$message}}</h6>
              @enderror
              <div class="mb-3">
                <label for="tarea" class="form-label">Titulo de la nueva tarea</label>
                <input type="text" class="form-control" id="tarea" name="tarea" aria-describedby="tituloTarea">
              </div>
              <div class="mb-3">
                <label for="categoria" class="form-label">Categoria de la tarea</label>
                <select class="form-select" aria-label="Seleccionar categoria..." id="categoria" name="categoria">
                  @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-plus"></i> Crear Tarea</button>
            </form>
          </div>
        </div>
      </article>

      <div class="col-12 container mt-3">
        <div class="row d-flex justify-content-center">
          @foreach ($tareas as $tarea)
            <div class="col-md-3 p-1">
              <div class="p-2" style="text-align:center">
                <h5>{{$tarea->titulo}}</h5>

                <form action="{{route('editar_tarea', ['id'=>$tarea->id])}}" method="POST">
                  @csrf
                  <button class="btn btn-sm btn-warning" type="submit"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                </form>

                <form action="{{route('eliminar_tarea', ['id'=>$tarea->id])}}" method="post">
                  @method("DELETE")  
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#elimina-categoria-{{$categoria->id}}">
                    <i class="fa-solid fa-trash"></i> Eliminar
                  </button>
                </form>
              </div>
            </div>

            
          @endforeach
        </div>
      </div>
      @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show col-md-3" role="alert" style="position:absolute;right:10px;top:60px;">
          {{session("success")}}
        </div>
      @endif
    </div>
  </div>
@endsection