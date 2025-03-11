<h1>Crea un nuevo contacto</h1>
<form action="{{ url('/index/saveNewContact') }}" method="post">
    @csrf
    Nombre<input type="text" name="nombre"><br>
    @error('nombre')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    Telefono<input type="number" name="telefono"><br>
    @error('telefono')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Crear">
</form>
<form action="{{ url('/index') }}" method="get">
    <input type="submit" value="Volver">
</form>