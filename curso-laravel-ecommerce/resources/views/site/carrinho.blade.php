<?php
use Darryldecode\Cart\Facades\CartFacade;
?>

@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')
    <div class="row container">
        @if ($itens->count() == 0)
            <div class="card orange">
                <div class="card-content white-text">
                    <span class="card-title">Seu carrinho está vazio!</span>
                    <p>Aproveite nossas promoções!</p>
                </div>
            </div>
        @else
            <h5>Seu carrinho possui {{$itens->count()}} produtos</h5>
            <table class="striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                </thead>
        
                <tbody>
                    @foreach ($itens as $item)
                        <tr>
                            <td><img src="{{$item->attributes->image}}" width="70" alt="responsive-img circle"/></td>
                            <td>{{$item->name}}</td>
                            <td> R$ {{number_format($item->price, 2, ',', '.')}}</td>
                            {{-- BTN ATUALIZAR --}}
                            <form action="{{route('site.atualizaCarrinho')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <td><input type="number" min="1" name="quantity" class="white center" style="width: 40px; font-weight:700;" value="{{$item->quantity}}"></td>
                                <td>
                                    <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                            </form>
                                    {{-- BTN REMOVER --}}
                                    <form action="{{route('site.removeCarrinho')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">    
                                        <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card red">
                <div class="card-content white-text">
                    <span class="card-title">Valor total: R$ {{number_format(CartFacade::getTotal(), 2, ',', '.')}}</span>
                </div>
            </div>
        @endif
        
        <div class="row container center">
            <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
            <a href="{{route('site.limparCarrinho')}}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
            <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
        </div>
    </div>
@endsection
