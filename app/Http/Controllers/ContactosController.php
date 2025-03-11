<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Support\Facades\Auth;

class ContactosController extends Controller
{
    public function mostrarDatos()
    {
        $contactos = Contactos::where('id_usuario', Auth::user()->id)->get();
        $usuarioActual=Auth::user()->name;
        return view('index', compact('contactos','usuarioActual'));
    }
  
    
}
