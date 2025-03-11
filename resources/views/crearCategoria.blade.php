<h1>Crea una categoria</h1>
<form action="{{ url('/index/saveNewCategory') }}" method="post">
    @csrf
    Nombre<input type="text" name="categoria"><br>
    @error('categoria')
    <div style="color: red;">{{ $message }}</div>
    @enderror
    <input type="submit" value="Crear">
</form>
<form action="{{ url('/index') }}" method="get">
    <input type="submit" value="Volver">
</form>