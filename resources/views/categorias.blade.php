<h2>Categorias</h2>
<table border="1">
    @if (count($categorias)>0)
    <tr>
        <th>Nombre</th>
        <th>Eliminar</th>
    </tr>
    @foreach ($categorias as $categoria)
    <tr>
        <td>{{ $categoria->categoria }}</td>
        <td>
            <form action="{{ route('deleteCategory',$categoria->id) }}" method="post">
            @csrf
            @method('DELETE')
                <input type="submit" value="Eliminar">
            </form>
        </td>
        
    </tr>
    @endforeach
    @else
    <p>No hay categorias creadas</p>
    @endif
</table>
<form action="{{ url('/index') }}" method="get">
    <input type="submit" value="Volver">
</form>