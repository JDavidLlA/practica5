<?php

namespace App\Http\Controllers;

use App\Http\Requests\SitioRequest;
use App\Models\Sitio;
use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function index(Request $request)
    {
        $query = auth()->user()->sitios();

        if ($request->buscar) {
            $query->where('titulo', 'like', '%' . $request->buscar . '%');
        }

        if ($request->categoria) {
            $query->where('categoria', $request->categoria);
        }

        $sitios = $query->latest()->paginate(10);

        return view('sitios.index', compact('sitios'));
    }

    public function create()
    {
        return view('sitios.create');
    }

    public function store(SitioRequest $request)
    {
        auth()->user()->sitios()->create([
            'titulo' => $request->titulo,
            'url' => $request->url,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'destacado' => $request->has('destacado'),
        ]);

        return redirect()->route('sitios.index')->with('success', 'Sitio creado correctamente.');
    }

    public function edit(Sitio $sitio)
    {
        abort_if($sitio->user_id !== auth()->id(), 403);

        return view('sitios.edit', compact('sitio'));
    }

    public function update(SitioRequest $request, Sitio $sitio)
    {
        abort_if($sitio->user_id !== auth()->id(), 403);

        $sitio->update([
            'titulo' => $request->titulo,
            'url' => $request->url,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'destacado' => $request->has('destacado'),
        ]);

        return redirect()->route('sitios.index')->with('success', 'Sitio actualizado correctamente.');
    }

    public function destroy(Sitio $sitio)
    {
        abort_if($sitio->user_id !== auth()->id(), 403);

        $sitio->delete();

        return redirect()->route('sitios.index')->with('success', 'Sitio eliminado correctamente.');
    }
}