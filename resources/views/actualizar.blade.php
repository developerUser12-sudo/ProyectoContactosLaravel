<h1>Actualizar contacto</h1>
<form action="{{ route('update', $contacto->id) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $contacto->nombre }}"><br>
    @error('nombre')
    <div>{{ $message }}</div>
    @enderror
    <input type="text" name="telefono" value="{{ $contacto->telefono }}"><br>
    @error('telefono')
    <div>{{ $message }}</div>
    @enderror
    <button type="submit">Actualizar</button>
</form>
<form action="{{ url('/index') }}" method="get">
    <input type="submit" value="Cancelar">
</form>