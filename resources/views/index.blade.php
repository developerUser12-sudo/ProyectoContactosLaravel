        <h1>Bienvenid@, <span>{{ $usuarioActual }}</span></h1>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contactos') }}
        </h2>
        <form action="{{ url('/index/create') }}">
            <input type="submit" value="Crear contacto">
        </form><br>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Categoria</th>
            </tr>
            @foreach($contactos as $contacto)
            <tr>
                <td>{{ $contacto->nombre }}</td>
                <td>{{ $contacto->telefono }}</td>
                <td>
                    @if ($categorias[$contacto->id]!=null)
                    <p>{{ $categorias[$contacto->id] }}</p>
                    @else
                    <p>No hay categorias añadidas</p>
                    @endif
                </td>
                <td>
                    <form method="get" action="{{ route('edit',$contacto->id) }}"><input type="submit" value="Actualizar"></form>
                </td>
                <td>
                    <form method="get" action="{{ route('contactCategories',$contacto->id) }}"><input type="submit" value="Añadir/Editar categoria"></form>
                </td>
                <td>
                    <form action="{{ route('delete',$contacto->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>

            </tr>
            @endforeach
        </table><br>

        <form action="{{ url('/index/createCategory') }}">
            <input type="submit" value="Crear categoria">
        </form>
        <form action="{{ url('/index/userCategories') }}">
            <input type="submit" value="Categorias">
        </form>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Cerrar sesion">
        </form>