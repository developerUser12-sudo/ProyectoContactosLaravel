<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use \App\Models\Contactos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CrearCategoriaController extends Controller
{

    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'categoria' => [
                'required',
                'max:20',
                Rule::unique('categorias')->where('id_usuario', Auth::id())
            ],
        ]);
        Categorias::create([
            'categoria' => $validated['categoria'],
            'id_usuario' => Auth::id(),
        ]);

        return redirect()->route('dashboard');
    }
}
