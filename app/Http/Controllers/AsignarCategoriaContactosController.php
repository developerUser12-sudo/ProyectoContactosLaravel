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
       $categoria=ContactosCategorias::where('id_usuario',Auth::id())->where('id_contacto',$id)->first();
       if ($categoria) {
        $categoria->delete();
       } 
       ContactosCategorias::create([
            'id_categoria' => $request->categoria,
            'id_usuario' => Auth::id(),
            'id_contacto' => $id
        ]);
        return redirect()->route('dashboard');
    }
}
