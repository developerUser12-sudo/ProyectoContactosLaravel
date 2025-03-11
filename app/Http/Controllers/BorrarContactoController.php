<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;

class BorrarContactoController extends Controller
{
    public function borrarContacto($id)
    {
        $contacto = Contactos::find($id);
        if (!$contacto) {
            return redirect()->route('dashboard');
        }
        $contacto->delete();
        return redirect()->route('dashboard');
    }
}
