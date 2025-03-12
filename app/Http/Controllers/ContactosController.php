<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\ContactosCategorias;
use App\Models\Categorias;
use Illuminate\Support\Facades\Auth;

class ContactosController extends Controller
{
    public function mostrarDatos()
    {
        $contactos = Contactos::where('id_usuario', Auth::id())->get();
        $categorias = [];        
        foreach ($contactos as $contacto) {
            $categoriaId = ContactosCategorias::where('id_contacto', $contacto->id)->where('id_usuario', Auth::id())->first();             
            if ($categoriaId) {
                $categoria = Categorias::where('id', $categoriaId->id_categoria)->first();
                $categorias[$contacto->id] = $categoria->categoria;
            } else {
                $categorias[$contacto->id] = '';
            }
        }
        $usuarioActual = Auth::user()->name;
        return view('index', compact('contactos', 'categorias', 'usuarioActual'));
    }
}
