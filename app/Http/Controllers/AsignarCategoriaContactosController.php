<?php

namespace App\Http\Controllers;

use App\Models\CategoriaContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactosCategorias;

class AsignarCategoriaContactosController extends Controller
{
    public function addCategory(Request $request,$id)
    {
        
        ContactosCategorias::create([
            'id_categoria' => $request->categoria,
            'id_usuario' => Auth::id(),
            'id_contacto' => $id
        ]);

        return redirect()->route('dashboard');
    }
}
