<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Categoria;

class TareasControlador extends Controller
{
    public function index() {
        $tareas = Tarea::all();
        $categorias = Categoria::all();
        return view("tareas.index", ["tareas"=>$tareas, "categorias"=>$categorias]);
    }

    public function store(Request $request){
        $request->validate([
            "tarea" => "required|min:3",
            "categoria" => "required"
        ]);
        $tarea = new Tarea;
        $tarea->titulo = $request->tarea;
        $tarea->id_categoria = $request->categoria;
        $tarea->save();

        return redirect()->route("tareas")->with("success", "Tarea creada satisfactoriamente!");
    }

    public function destroy($id){
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect()->route("tareas")->with("success", "Tarea eliminada satisfactoriamente!");
    }

    public function show($id){
        $tarea = Tarea::find($id);
        $categorias = Categoria::all();
        return view("tareas.editar", ["tarea"=>$tarea, "categorias"=>$categorias]);
    }

    public function update(Request $request, $id) {
        $tarea = Tarea::find($id);
        $tarea->titulo = $request->tarea;
        $tarea->id_categoria = $request->categoria;
        $tarea->save();

        return redirect()->route("tareas")->with("success", "Tarea actualizada correctamente.");
    }
}
