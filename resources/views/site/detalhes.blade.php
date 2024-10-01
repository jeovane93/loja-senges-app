<!-- Herdar o layout -->
@extends('layout.app')
<!-- Editar o titulo da pagina -->
@section('title', $produto->nome)
<!-- Inserir o conteudo no content -->
@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <!-- imagem -->
        <img src="{{$produto->imagem}}"
            alt="{{$produto->nome}}"
            class="img-fluid">
    </div>
    <div class="col-12 col-md-6">
        <!-- descrição e adcionar ao carrinho -->
        <h3>{{$produto->nome}}</h3>
        <h4>Preço: R${{number_format($produto->preco,2,',',',')}}</h4>
        <p>
            <strong>Categoria:</strong>
            {{$produto->category->nome}}
        </p>
        <p>
            <strong>Descrição:</strong>
            {{$produto->descricao}}
        </p>
        <p>
            Postado por:
            <strong>
                {{$produto->user->name}}
            </strong>
        </p>
        <!-- Formulario de envio pro carrinho -->
         <form action="/carrinho" method="POST" enctype="multipart/form-data">
            <!-- Adcionar o token -->
             @csrf
             <input type="hidden" name="id" value="{{$produto->id}}">
             <input type="hidden" name="name" value="{{$produto->nome}}">
             <input type="hidden" name="price" value="{{$produto->preco}}">
             <input type="hidden" name="img" value="{{$produto->imagem}}">
             <!-- Input visivel -->
              <div class="mb-3">
                <label for="qnt" class="label-form">
                    Quantidade:</label>
                    <input type="number" name='qnt' id='qnt' min='1' value='1' class="form-contro" step='1'>
              </div>
              <button 
              type='submit'
              class="btn btn-warning btn-large">
                Comprar
              </button>
         </form>
    </div>
</div>
@endsection