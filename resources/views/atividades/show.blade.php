@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0 p-2">
                        Detalhes da Atividade
                    </h4>
                </div>
                <div class="card-body p-4">
                    {{-- Os campos abaixo estão desabilitados pois esta é uma tela de visualização --}}
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome da Tarefa</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="{{ $atividade->nome }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição da Tarefa</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $atividade->descricao }}" disabled>
                    </div>

                    @php
                        $statusLabels = [
                            'pendente' => 'Pendente',
                            'em_andamento' => 'Em Andamento',
                            'concluida' => 'Concluída',
                            'cancelada' => 'Cancelada',
                        ];
                        $displayStatus = $statusLabels[$atividade->status] ?? ucfirst($atividade->status);
                    @endphp
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" value="{{ $displayStatus }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $atividade->categoria->name ?? 'Sem categoria' }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="data" value="{{ \Carbon\Carbon::parse($atividade->data)->format('Y-m-d') }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_bloco" class="form-label">Tipo de Bloco</label>
                        <select class="form-select" id="tipo_bloco" name="tipo_bloco" disabled>
                            <option value="30_min" @selected($atividade->tipo_bloco == '30_min')>30 minutos</option>
                            <option value="1_hora" @selected($atividade->tipo_bloco == '1_hora')>1 hora</option>
                            <option value="turno" @selected($atividade->tipo_bloco == 'turno')>Turno</option>
                        </select>
                    </div>

                    <div class="mb-3" id="horario_field" style="display: none;">
                        <label for="horario" class="form-label">Horário</label>
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" value="{{ $atividade->hora_inicio }}" disabled>
                    </div>

                    <div class="mb-3" id="turno_field" style="display: none;">
                        <label for="turno" class="form-label">Turno</label>
                        <select class="form-select" name="turno" disabled>
                            <option value="manha" @selected($atividade->turno == 'manha')>Manhã</option>
                            <option value="tarde" @selected($atividade->turno == 'tarde')>Tarde</option>
                            <option value="noite" @selected($atividade->turno == 'noite')>Noite</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end align-items-center gap-3 mt-4">
                        <a class="btn btn-secondary btn-md px-4" href="{{ route('atividades.index') }}">
                            Voltar
                        </a>
                        <a href="{{ route('atividades.edit', $atividade->id) }}" class="btn btn-primary btn-md px-4">
                            Editar
                        </a>
                        <form action="{{ route('atividades.destroy', $atividade->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-md px-4" onclick="return confirm('Tem certeza que deseja excluir esta atividade?')">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Exibe o horário correto (horário ou turno)--}}
<script>
function toggleHorarioField() {
    const tipo = document.getElementById('tipo_bloco').value;
    document.getElementById('horario_field').style.display = (tipo === '30_min' || tipo === '1_hora') ? 'block' : 'none';
    document.getElementById('turno_field').style.display = (tipo === 'turno') ? 'block' : 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    toggleHorarioField();
});
</script>

@endsection