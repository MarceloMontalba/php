@extends("app")

@section("contenido")
  <div class="container w-25 boder p-4 my-4">
    <div class="row mx-auto">
      <form action="{{route('categories.store')}}" method="POST">
        @csrf

        @if(session("success"))
          <h6 class="alert alert-success">{{session("success")}}</h6>
        @endif
        @error("name")
          <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <div class="mb-3">
          <label for="name" class="form-label">Nombre de la Categoria</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
          <label for="color" class="form-label">Color de la Categoria</label>
          <input type="color" class="form-control" id="color" name="color">
        </div>
        <button type="submit" class="btn btn-primary">Crear nueva Categoria</button>
      </form>

      <div>
        @foreach ($categories as $category)
          <div class="row py-1 mt-3">
            <div class="col-md-10 d-flex align-items-center">
              <a href="{{ route('categories.show',['category'=>$category->id]) }}" class="d-flex align-items-center gap-2">
                <span style="background-color:{{ $category->color }};color:black" class="w-100 py-1 container">{{ $category->name }}</span>
              </a>
            </div>

            <div class="col-md-1 d-flex justy-content-end">
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{$category->id}}">
                  Eliminar
                </button>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="modal-{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Aviso!</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mb-0">
                  <p>Al eliminar la categoria <strong>"{{$category->name}}"</strong> se eliminarán tambien 
                  todas las tareas que pertenecen a esta categoria. ¿Está seguró de eliminarla?</p>
                </div>
                <div class="modal-footer">
                  <form action="{{ route('categories.destroy', ['category'=>$category->id]) }}" method="post">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Confirmar Eliminación</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        @endforeach
      </div>
    </div>
  </div>
@endsection