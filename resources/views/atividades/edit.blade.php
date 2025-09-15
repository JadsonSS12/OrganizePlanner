@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0 p-2">
                        Editar atividade
                    </h4>
                </div>
                <div class="card-body p-4">
                    {{-- Certifique-se de que o controller está passando a variável $atividade para esta view --}}
                    <form action="{{ route('atividades.update', $atividade->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome da Tarefa</label>
                            {{-- Preenche o campo nome com o valor atual --}}
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $atividade->nome) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                {{-- A diretiva @selected verifica qual o status atual e seleciona a option correta --}}
                                <option value="pendente" @selected(old('status', $atividade->status) == 'pendente')>Pendente</option>
                                <option value="em_andamento" @selected(old('status', $atividade->status) == 'em_andamento')>Em Andamento</option>
                                <option value="concluida" @selected(old('status', $atividade->status) == 'concluida')>Concluída</option>
                                <option value="cancelada" @selected(old('status', $atividade->status) == 'cancelada')>Cancelada</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da Tarefa</label>
                            {{-- Preenche a descrição com o valor atual --}}
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ old('descricao', $atividade->descricao) }}" placeholder="Descreva sua tarefa..." required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Categoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" selected disabled>Selecione a categoria</option>
                                @foreach ($categorias as $categoria)
                                    {{-- A diretiva @selected verifica a categoria atual --}}
                                    <option value="{{$categoria->id}}" @selected(old('category_id', $atividade->category_id) == $categoria->id)>{{$categoria->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            {{-- Preenche o campo de data --}}
                            <input type="date" class="form-control" id="data" name="data" value="{{ old('data', $atividade->data) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_bloco" class="form-label">Tipo de Bloco</label>
                            <select class="form-select" id="tipo_bloco" name="tipo_bloco" required onchange="toggleHorarioField()">
                                <option value="">Selecione...</option>
                                {{-- A diretiva @selected verifica o tipo_bloco atual --}}
                                <option value="30_min" @selected(old('tipo_bloco', $atividade->tipo_bloco) == '30_min')>30 minutos</option>
                                <option value="1_hora" @selected(old('tipo_bloco', $atividade->tipo_bloco) == '1_hora')>1 hora</option>
                                <option value="turno" @selected(old('tipo_bloco', $atividade->tipo_bloco) == 'turno')>Turno</option>
                            </select>
                        </div>

                        <div class="mb-3" id="horario_field" style="display: none;">
                            <label for="horario" class="form-label">Horário</label>
                             {{-- Preenche o campo de hora_inicio --}}
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio', $atividade->hora_inicio) }}">
                        </div>

                        <div class="mb-3" id="turno_field" style="display: none;">
                            <label for="turno" class="form-label">Turno</label>
                            <select class="form-select" name="turno">
                                <option value="">Selecione...</option>
                                {{-- A diretiva @selected verifica o turno atual --}}
                                <option value="manha" @selected(old('turno', $atividade->turno) == 'manha')>Manhã</option>
                                <option value="tarde" @selected(old('turno', $atividade->turno) == 'tarde')>Tarde</option>
                                <option value="noite" @selected(old('turno', $atividade->turno) == 'noite')>Noite</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end align-items-center gap-3">
                            <div>
                                <a class="btn btn-secondary btn-md px-4" href="{{ route('atividades.index') }}">
                                    Voltar
                                </a>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Adiciona um script para executar a função de toggle no carregamento da página --}}
<script>
    function toggleHorarioField() {
        const tipo = document.getElementById('tipo_bloco').value;
        document.getElementById('horario_field').style.display = (tipo === '30_min' || tipo === '1_hora') ? 'block' : 'none';
        document.getElementById('turno_field').style.display = (tipo === 'turno') ? 'block' : 'none';
    }

    // Executa a função quando a página for carregada para mostrar os campos corretos
    document.addEventListener('DOMContentLoaded', function() {
        toggleHorarioField();
    });
</script>
@endsection