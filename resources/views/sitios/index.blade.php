<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Mis sitios favoritos</h1>

        @if(session('success'))
            <div class="bg-green-100 p-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('sitios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            Nuevo sitio
        </a>

        <form method="GET" class="mt-4 mb-4 flex gap-2">
            <input type="text" name="buscar" placeholder="Buscar por título" value="{{ request('buscar') }}" class="border rounded p-2">

            <select name="categoria" class="border rounded p-2">
                <option value="">Todas</option>
                <option value="Educación">Educación</option>
                <option value="Herramientas">Herramientas</option>
                <option value="Noticias">Noticias</option>
                <option value="Entretenimiento">Entretenimiento</option>
                <option value="Redes sociales">Redes sociales</option>
                <option value="Otros">Otros</option>
            </select>

            <button class="bg-gray-800 text-white px-4 py-2 rounded">Filtrar</button>
        </form>

        <div class="mt-4">
            @foreach($sitios as $sitio)
                <div class="border p-4 mb-3 rounded">
                    <h2 class="text-xl font-bold">
                        {{ $sitio->titulo }}
                        @if($sitio->destacado)
                            ⭐
                        @endif
                    </h2>

                    <p>{{ $sitio->categoria }}</p>
                    <p>{{ $sitio->descripcion }}</p>

                    <a href="{{ $sitio->url }}" target="_blank" class="text-blue-600">
                        Visitar sitio
                    </a>

                    <div class="mt-3">
                        <a href="{{ route('sitios.edit', $sitio) }}" class="text-yellow-600">
                            Editar
                        </a>

                        <form action="{{ route('sitios.destroy', $sitio) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar sitio?')" class="text-red-600">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $sitios->links() }}
    </div>
</x-app-layout>