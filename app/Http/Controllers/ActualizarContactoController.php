<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ActualizarContactoController extends Controller
{

    public function edit($id)
    {
        $contacto = Contactos::find($id);
        return view('actualizar', compact('contacto'));
    }
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'nombre' => [
                'required',
                'max:20',
                Rule::unique('contactos')->ignore($id)->where('id_usuario', Auth::id()), 
            ],
            'telefono' => [
                'required',
                'regex:/^[0-9]{9}$/',
                 Rule::unique('contactos')->ignore($id)->where('id_usuario', Auth::id())
            ],
        ]);
        $contacto = Contactos::find($id);
        if (!$contacto) {
            return redirect()->route('dashboard');
        }
        $contacto->nombre = $validated['nombre'];
        $contacto->telefono = $validated['telefono'];
        $contacto->save();
        return redirect()->route('dashboard');
    }
}
