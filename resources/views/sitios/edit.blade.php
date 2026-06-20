<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Editar Sitio Favorito</h1>

        @if ($errors->any())
            <div class="bg-red-100 p-3 mb-4">
                @foreach ($errors->all() as $error)
                    <p>• {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('sitios.update', $sitio) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block font-bold">Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $sitio->titulo) }}" class="w-full border rounded p-2 mb-4">

            <label class="block font-bold">URL</label>
            <input type="url" name="url" value="{{ old('url', $sitio->url) }}" class="w-full border rounded p-2 mb-4">

            <label class="block font-bold">Categoría</label>
            <select name="categoria" class="w-full border rounded p-2 mb-4">
                @foreach(['Educación','Herramientas','Noticias','Entretenimiento','Redes sociales','Otros'] as $cat)
                    <option value="{{ $cat }}" @selected(old('categoria', $sitio->categoria) == $cat)>
                        {{ $cat }}
                    </option>
                @endforeach
            </select>

            <label class="block font-bold">Descripción</label>
            <textarea name="descripcion" rows="4" class="w-full border rounded p-2 mb-4">{{ old('descripcion', $sitio->descripcion) }}</textarea>

            <label class="block mb-4">
                <input type="checkbox" name="destacado" @checked(old('destacado', $sitio->destacado))>
                Marcar como destacado
            </label>

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>

            <a href="{{ route('sitios.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">
                Volver
            </a>
        </form>
    </div>
</x-app-layout>