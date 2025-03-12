<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\ContactosCategorias;

class BorrarCategoriaController extends Controller
{
    public function borrarCategoria($id)
    {
        $categoriaId=ContactosCategorias::where('id_categoria',$id);
        $categoriaId->delete();
        $categoria = Categorias::find($id);
        $categoria->delete();
        return redirect()->route('userCategories');
    }
}
