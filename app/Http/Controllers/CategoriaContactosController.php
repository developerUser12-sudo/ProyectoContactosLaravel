<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactosCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaContactosController extends Controller
{
    public function mostrarCategorias($id)
    {
        $categorias = ContactosCategoria::where('id_usuario', Auth::user()->id)->where('id_contacto',$id)->get();
        return view('index', compact('categorias'));
    }
}
