<!-- Herdar as configurações do Layout -->
@extends('layout.app')
<!-- Ajustar o Titulo -->
@section('title','Categorias')
<!-- Criar o main -->
@section('content')
<!-- Titulo h1, h2, h3 -->
<h1>Categorias</h1>
<a href="/admin/categorias/create"
    class="btn btn-success">Novo</a>
<div>
    <table
        class="table table-striped table-responsive mt-3 text-center">
        <thead>
            <th >Nome</th>
            <th colspan="3" style="width:10%">Ações</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{$categoria->nome}}</td>
                <!-- show -->
                <td>
                    <a href="/admin/categorias/{{$categoria->id}}"
                        class="btn btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>
                </td>
                <!-- edit -->
                <!-- href="/admin/categorias/{{$categoria}}/edit" -->

                <td>
                    <a href="/admin/categorias/{{$categoria}}/edit"
                        class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <!-- remover -->
                <!-- route('admin.categorias.destroy',$categoria) -->
                <td>

                    <form action="/admin/categorias/{{$categoria->id}}"
                        method="POST">
                        <!-- token -->
                        @csrf
                        <!-- alterar para o metodo delete -->
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Remoção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja remover esta categoria?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="/admin/categorias/{{$categoria->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var categoryId = button.getAttribute('data-category-id');
        var form = document.getElementById('deleteForm');
        form.action = '/admin/categorias/' + categoryId;
    });
</script>
@endsection