<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use App\Models\ContactosCategorias;

class BorrarContactoController extends Controller
{
    public function borrarContacto($id)
    {
        $categoriaId=ContactosCategorias::where('id_contacto',$id);
        $categoriaId->delete();
        $contacto = Contactos::find($id);
        $contacto->delete();
        return redirect()->route('dashboard');
    }
}
