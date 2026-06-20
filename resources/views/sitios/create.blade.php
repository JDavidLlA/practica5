<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-4">
            Nuevo Sitio Favorito
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sitios.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-bold">Título</label>
                <input
                    type="text"
                    name="titulo"
                    value="{{ old('titulo') }}"
                    class="w-full border rounded p-2"
                >
            </div>

            <div class="mb-4">
                <label class="block font-bold">URL</label>
                <input
                    type="url"
                    name="url"
                    value="{{ old('url') }}"
                    class="w-full border rounded p-2"
                >
            </div>

            <div class="mb-4">
                <label class="block font-bold">Categoría</label>

                <select name="categoria" class="w-full border rounded p-2">
                    <option value="Educación">Educación</option>
                    <option value="Herramientas">Herramientas</option>
                    <option value="Noticias">Noticias</option>
                    <option value="Entretenimiento">Entretenimiento</option>
                    <option value="Redes sociales">Redes sociales</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Descripción</label>

                <textarea
                    name="descripcion"
                    rows="4"
                    class="w-full border rounded p-2"
                >{{ old('descripcion') }}</textarea>
            </div>

            <div class="mb-4">
                <label>
                    <input type="checkbox" name="destacado">
                    Marcar como destacado
                </label>
            </div>

            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded"
            >
                Guardar Sitio
            </button>

            <a
                href="{{ route('sitios.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded ml-2"
            >
                Volver
            </a>
        </form>

    </div>
</x-app-layout>