<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasControlador extends Controller
{
    public function store(Request $request){
        $request->validate([
            'categoria'=>"required|min:3",
            'color'=>"min:1"
        ]);

        $categoria = new Categoria;
        $categoria->titulo = $request->categoria;
        $categoria->color  = $request->color;
        $categoria->save();

        return redirect()->route("crea_categoria")->with("success", "Categoria creada satisfactoriamente!");
    }

    public function index() {
        $categorias = Categoria::all();
        return view("categorias.index",["categorias"=>$categorias]);
    }

    public function destroy($id){
        $categoria = Categoria::find($id);
        $categoria->tareas()->each(function($tarea){
            $tarea->delete();
        });

        $categoria->delete();
        return redirect()->route("crea_categoria")->with("success", "Categoria eliminada satisfactoriamente!");
    }

    public function show($id){
        $categoria = Categoria::find($id);
        return view("categorias.editar", ["categoria"=>$categoria]);
    }

    public function update(Request $request, $id){
        $categoria = Categoria::find($id);
        $categoria->titulo = $request->categoria;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route("crea_categoria")->with("success", "Categoria actualizada correctamente!");
    }
}
