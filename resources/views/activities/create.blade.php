@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">
                        <i class="bi bi-calendar-plus me-2"></i>
                        Criar Planejamento
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('atividades.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" class="form-control" id="data" name="data" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_bloco" class="form-label">Tipo de Bloco</label>
                            <select class="form-select" id="tipo_bloco" name="tipo_bloco" required onchange="toggleHorarioField()">
                                <option value="">Selecione...</option>
                                <option value="30_min">30 minutos</option>
                                <option value="1_hora">1 hora</option>
                                <option value="turno">Turno</option>
                            </select>
                        </div>

                        <div class="mb-3" id="horario_field" style="display: none;">
                            <label for="horario" class="form-label">Horário</label>
                            <input type="time" class="form-control" id="horario" name="horario">
                        </div>

                        <div class="mb-3" id="turno_field" style="display: none;">
                            <label for="turno" class="form-label">Turno</label>
                            <select class="form-select" name="turno">
                                <option value="">Selecione...</option>
                                <option value="manha">Manhã</option>
                                <option value="tarde">Tarde</option>
                                <option value="noite">Noite</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição da Tarefa</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descreva sua tarefa..." required></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4" href="{{ route('atividades.index') }}">
                                <i class="bi bi-check2-circle me-1" ></i> Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script para exibir campo de horário ou turno --}}
<script>
function toggleHorarioField() {
    const tipo = document.getElementById('tipo_bloco').value;
    document.getElementById('horario_field').style.display = (tipo === '30_min' || tipo === '1_hora') ? 'block' : 'none';
    document.getElementById('turno_field').style.display = (tipo === 'turno') ? 'block' : 'none';
}
</script>

@endsection
