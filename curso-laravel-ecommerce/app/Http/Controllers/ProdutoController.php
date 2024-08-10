<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;
use \App\Models\Categoria;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$produtos = Produto::paginate(3);
        return view('site.home', compact('produtos'));*/

        $produtos = Produto::paginate(5);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();
        if($request->imagem){
            $produto['imagem'] = $request->imagem->store('produtos');
        }else{
            $produto['imagem'] = null;
        }
        $produto['slug'] = Str::slug($request->nome);
        $produto = Produto::create($produto);

        return redirect()->route('admin.produtos')->with('sucesso', $request->nome . ' cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'descricao' => 'required',
            'id_categoria' => 'required',
            'id_user' => 'required'
        ]);

        if($request->imagem){
            $validate['imagem'] = $request->imagem->store('produtos');
        }

        $validate['slug'] = Str::slug($request->nome);
        $validate = Produto::where('id', $id)->update($validate);

        return redirect()->route('admin.produtos')->with('sucesso', (string)$request->nome . ' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos');
    }
}
