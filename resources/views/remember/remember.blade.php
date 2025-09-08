@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Lista de Lembretes</h1>
        <a href="{{ route('remembers.create') }}" class="btn btn-primary">Novo Lembrete</a>
    </div>

    {{-- Cabeçalho das colunas --}}
    <div class="card mb-2 p-3 text-white fw-bold" style="background-color: #4b4b4b;">
        <div class="row g-3">
            <div class="col-md-1"></div> {{-- Coluna para o checkbox --}}
            <div class="col-md-3">Nome</div>
            <div class="col-md-3">Descrição</div>
            <div class="col-md-2">Tipo</div>
            <div class="col-md-1">Semanal</div>
            <div class="col-md-2 text-md-end">Data</div>
        </div>
    </div>

    {{-- Lista de Lembretes --}}
    <div id="lembretes-lista">
        @foreach($remembers as $remember)
        <div class="card mb-3 p-3 shadow-sm rounded lembrete-item" data-id="{{ $remember->id }}" style="background-color: #f8f9fa;">
            <div class="row g-3 align-items-center">
                {{-- Checkbox de exclusão --}}
                <div class="col-md-1">
                    <input type="checkbox" class="form-check-input delete-checkbox" data-id="{{ $remember->id }}">
                </div>
                <div class="col-md-3">{{ $remember->title }}</div>
                <div class="col-md-3">{{ $remember->description }}</div>
                <div class="col-md-2">{{ $remember->typeRemember->value }}</div>
                <div class="col-md-1">{{ $remember->semanal ? 'Sim' : 'Não' }}</div>
                <div class="col-md-2 text-md-end">
                    {{ \Carbon\Carbon::parse($remember->dateTime)->format('d/m/Y') }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Script para a funcionalidade de arrastar e soltar --}}
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
    var el = document.getElementById('lembretes-lista');
    var sortable = Sortable.create(el, {
        animation: 150,
        ghostClass: 'sortable-ghost',
        onEnd: function (evt) {
            // Este é o lugar onde você enviaria a nova ordem para o servidor.
            // Por enquanto, é apenas um placeholder.
            console.log('Ordem alterada!');
            var novaOrdem = Array.from(el.children).map(item => item.id);
            console.log(novaOrdem);
        }
    });


  // Script para a funcionalidade de deleção por checkbox
    document.addEventListener('DOMContentLoaded', function () {
        const checkboxes = document.querySelectorAll('.delete-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    if (confirm('Tem certeza que deseja deletar este lembrete?')) {
                        const lembreteId = this.getAttribute('data-id');
                        
                        fetch(`/remembers/${lembreteId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                // Se a deleção for bem-sucedida, recarrega a página.
                                window.location.reload();
                            } else {
                                console.error('Erro ao deletar o lembrete.');
                                this.checked = false; // Desmarca o checkbox em caso de erro
                            }
                        })
                        .catch(error => {
                            console.error('Erro de rede:', error);
                            this.checked = false;
                        });
                    } else {
                        this.checked = false; // Desmarca o checkbox se o usuário cancelar
                    }
                }
            });
        });
    });
</script>
@endsection