<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Contactos;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
    public function mostrarCategorias()
    {
        $categorias = Categorias::where('id_usuario', Auth::id())->get();
        return view('categorias', compact('categorias'));
    }
}
