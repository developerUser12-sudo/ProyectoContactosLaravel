<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoriasByContactController extends Controller
{
    public function mostrarCategoriasByContact($id)
    {
        $categorias = Categorias::where('id_usuario', Auth::id())->get();
        $contacto=Contactos::find($id);
        return view('añadirCategorias', compact('categorias','contacto'));
    }
}
