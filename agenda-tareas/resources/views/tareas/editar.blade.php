@extends("index")

@section("contenido")
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <article class="col-md-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <i class="fa-solid fa-puzzle-piece"></i> Editar tarea
          </div>
          <div class="card-body">
            <form action="{{route('actualizar_tarea', ['id'=>$tarea->id])}}" method="POST">
              @method("PATCH")
              @csrf

              @error("tarea")
                <h6 class="alert alert-danger">{{$message}}</h6>
              @enderror
              <div class="mb-3">
                <label for="tarea" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control" id="tarea" name="tarea" aria-describedby="tituloTarea" value="{{$tarea->titulo}}">
              </div>
              <div class="mb-3">
                <label for="categoria" class="form-label">Categoria de la tarea</label>
                <select class="form-select" aria-label="Seleccionar categoria..." id="categoria" name="categoria">
                  @foreach ($categorias as $categoria)
                    @if($categoria->id == $tarea->id_categoria)
                      <option value="{{$categoria->id}}" selected>{{$categoria->titulo}}</option>
                    @else
                      <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-plus"></i> Actualizar Tarea</button>
            </form>
          </div>
        </div>
      </article>

      @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show col-md-3" role="alert" style="position:absolute;right:10px;top:60px;">
          {{session("success")}}
        </div>
      @endif
    </div>
  </div>
@endsection