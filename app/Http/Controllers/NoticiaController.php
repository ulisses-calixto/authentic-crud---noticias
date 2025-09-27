<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::with('user')->latest()->paginate(5);

        return view('noticias.index', compact('noticias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $request->user()->noticias()->create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Notícia criada com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Noticia $noticia)
    {
        return view('noticias.show', compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        if ($noticia->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para editar esta notícia.');
        }

        return view('noticias.edit', compact('noticia'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        if ($noticia->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para editar esta notícia.');
        }

        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $noticia->update([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
        ]);

        return redirect()->route('noticias.index')->with('success', 'Notícia atualizada com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        if ($noticia->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para excluir esta notícia.');
        }

        $noticia->delete();

        return redirect()->route('noticias.index')->with('success', 'Notícia excluída com sucesso!');
    }

}
