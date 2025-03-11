<?php

namespace App\Http\Controllers;

use \App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CrearContactoController extends Controller
{

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nombre' => [
                'required',
                'max:20',
                Rule::unique('contactos')->where('id_usuario', Auth::id())
            ],
            'telefono' => [
                'required',
                'regex:/^[0-9]{9}$/',
                Rule::unique('contactos')->where('id_usuario', Auth::id())
            ],
        ]);
        Contactos::create([
            'nombre' => $validated['nombre'],
            'telefono' => $validated['telefono'],
            'id_usuario' => Auth::id(),
        ]);

        return redirect()->route('dashboard');
    }
}
