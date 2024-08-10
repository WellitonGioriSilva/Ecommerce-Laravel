<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = CartFacade::getContent();
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img
            )
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }

    public function removeCarrinho(Request $request){
        CartFacade::remove($request->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido no carrinho com sucesso!');
    }

    public function atualizaCarrinho(Request $request){
        CartFacade::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado no carrinho com sucesso!');
    }

    public function limparCarrinho(){
        CartFacade::clear();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vazio!');

    }
}
