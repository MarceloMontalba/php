@extends("index")

@section("contenido")
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <article class="col-md-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <i class="fa-solid fa-puzzle-piece"></i> Editar categoria
          </div>
          <div class="card-body">
            <form action="{{ route('actualizar_categoria', ['id'=>$categoria->id]) }}" method="post">
              @method("PATCH")
              @csrf

              @error("categoria")
                <h6 class="alert alert-danger">{{$message}}</h6>
              @enderror
              <div class="mb-3">
                <label for="categoria" class="form-label">Titulo de la Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="tituloCategoria" value="{{$categoria->titulo}}">
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Color de la Categoria</label>
                <input type="color" class="form-control form-control-color" id="color" name="color" aria-describedby="colorCategoria" title="Selecciona el color..." value="{{$categoria->color}}">
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>
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