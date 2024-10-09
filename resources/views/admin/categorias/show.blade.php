@extends('layout.app')
@section('title',$category->nome)
@section('content')
<div>
    <!-- h1 titulo -->
    <h1>{{$category->nome}}</h1>
    <!-- p paragrafo -->
    <p>{{$category->descricao}}</p>
    <!-- route('admin.categorias') -->                 
    <a href="/admin/categorias"
    class="btn btn-primary">Voltar</a>
</div>
@endsection