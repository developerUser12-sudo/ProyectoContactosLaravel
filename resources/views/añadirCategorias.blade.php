<h1>Categorias</h1>
<form action="{{ route('addCategory',$contacto->id) }}" method="post">
    @csrf
    @if (count($categorias)>0)
    <select name="categoria" id="">
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
        @endforeach
    </select><br>
    <input type="submit" value="Añadir">
    @else 
    <p>No hay categorias creadas</p>
    @endif
</form>
<form action="{{ url('/index') }}" method="get">
    <input type="submit" value="Volver">
</form>