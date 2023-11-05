@extends("index")

@section("contenido")
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <article class="col-md-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <i class="fa-solid fa-puzzle-piece"></i> Crear nueva categoria
          </div>
          <div class="card-body">
            <form action="{{route('agregar_categoria')}}" method="POST">
              @csrf

              @error("categoria")
              <h6 class="alert alert-danger">{{$message}}</h6>
              @enderror
              <div class="mb-3">
                <label for="categoria" class="form-label">Titulo de la nueva Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="tituloCategoria">
              </div>
              <div class="mb-3">
                <label for="color" class="form-label">Color de la Categoria</label>
                <input type="color" class="form-control form-control-color" id="color" name="color" aria-describedby="colorCategoria" title="Selecciona el color...">
              </div>
              <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa-solid fa-plus"></i> Crear Categoria</button>
            </form>
          </div>
        </div>
      </article>

      <div class="col-12 container mt-3">
        <div class="row d-flex justify-content-center">
          @foreach ($categorias as $categoria)
            <div class="col-md-3 p-1">
              <div class="p-2" style="background-color:{{$categoria->color}};text-align:center">
                {{$categoria->titulo}}

                <form action="{{route('editar_categoria',['id'=>$categoria->id])}}" method="POST">
                  @csrf
                  <button class="btn btn-sm btn-warning" type="submit"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                </form>
                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#elimina-categoria-{{$categoria->id}}">
                  <i class="fa-solid fa-trash"></i> Eliminar
                </button>
              </div>

              <!-- Modal Eliminación -->
              <div class="modal fade" id="elimina-categoria-{{$categoria->id}}" tabindex="-1" aria-labelledby="modalEliminaCategoria" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                      <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-triangle-exclamation"></i> Aviso</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ¿Está seguro que desea eliminar la categoria "{{$categoria->titulo}}"?
                    </div>
                    <div class="modal-footer">
                      <form action="{{route('elimina_categoria',['id'=>$categoria->id])}}" method="post">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-sm btn-success">
                          <i class="fa-solid fa-check"></i> Confirmar
                        </button>
                      </form>
                      <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i> Cancelar
                      </button>
                    </div>
                  </div>
                </div>
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