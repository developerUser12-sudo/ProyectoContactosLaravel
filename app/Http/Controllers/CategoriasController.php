<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoriasController extends Controller
{
    public function mostrarCategorias($id)
    {
        $categorias = Categorias::where('id_usuario', Auth::user()->id)->where('id_contacto',$id)->get();
        return view('añadirCategorias', compact('categorias'));
    }
}
