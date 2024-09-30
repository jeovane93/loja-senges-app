<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    //Metodo responsavel pela visualização do carrinho
    public function lista(){
        //Pegar itens dos carrinho
        $items = \Cart::getContent();
        //redirecionar para a view carrinho e passar itens
        return view('site.carrinho', compact('items'));
    }
}
