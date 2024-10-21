<!-- Herdar as configurações do Layout -->
@extends('layout.app')
<!-- Ajustar o Titulo -->
@section('title','Produtos')
<!-- Criar o main -->
@section('content')
<!-- Titulo h1, h2, h3 -->
<h1>Produtos</h1>
<a href="/admin/produtos/create"
    class="btn btn-success">Novo</a>
<div>
    <table
        class="table table-striped table-responsive mt-3 text-center">
        <thead>
            <th>Nome</th>
            <th>Preço</th>
            <th colspan="3" style="width:10%">Ações</th>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{$produto->nome}}</td>
                <td> R$ {{ number_format($produto->price, 2,',','.')}}</td>
                <!-- show -->
                <td>
                    <a href="/admin/produtos/{{$produto->id}}"
                        class="btn btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!-- edit -->
                <td>
                    <a href="/admin/produtos/{{$produto->id}}/edit"
                        class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!-- remover -->
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-product-id="{{$produto->id}}">
                        <i class="bi bi-trash"></i>
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- modal de confirmacao-->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- cabecalho -->
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModal">
                    Confirmar Remoção
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <!-- corpo -->
            <div class="modal-body">
                Tem certeza que deseja remover esse produto
            </div>
            <!-- footer -->
            <!-- route('admin.produtos.destroy',$produto) -->
            <div class="modal-footer">
                <form action="/admin/produtos/{{$produto->id}}"
                    method="POST">
                    <!-- token -->
                    @csrf
                    <!-- alterar para o metodo delete -->
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar

                    </button>
                    <button type="submit" class="btn btn-danger">
                        Remover
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var confirmDeleteModal = document.getElementById("confirmDeleteModal");
    confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var productId = button.getAttribute('data-product-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/produtos/' + productId;
    });
</script>
@endsection