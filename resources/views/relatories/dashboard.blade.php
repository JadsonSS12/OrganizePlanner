    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="mb-4">📊 Relatório Geral</h1>

        <div class="row mb-4">
            <!-- Metas -->
            <div class="col-md-6">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <h4 class="card-title">🎯 Metas</h4>
                        <ul class="list-unstyled">
                            <li><strong>Total:</strong> {{ $totalGoals }}</li>
                            <li><strong>Sucesso:</strong> {{ $sucessoGoals }} ({{ $percentSucesso }}%)</li>
                            <li><strong>Sem Sucesso:</strong> {{ $semSucessoGoals }}</li>
                            <li><strong>Parcialmente:</strong> {{ $parcialGoals }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Atividades -->
            <div class="col-md-6">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        <h4 class="card-title">✅ Atividades</h4>
                        <ul class="list-unstyled">
                            <li><strong>Total:</strong> {{ $totalAtividades }}</li>
                            <li><strong>Concluídas:</strong> {{ $concluidas }} ({{ $percentConcluidas }}%)</li>
                            <li><strong>Pendentes:</strong> {{ $pendentes }}</li>
                            <li><strong>Em Andamento:</strong> {{ $andamento }}</li>
                            <li><strong>Canceladas:</strong> {{ $canceladas }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Insights -->
        <div class="card shadow-sm rounded-3 mb-4">
            <div class="card-body">
                <h4 class="card-title">💡 Insights</h4>
                <p><strong>Categoria de tarefas mais usada:</strong>{{ $categoriaTop ? $categoriaTop->categoria->name : 'Nenhuma' }}
                <p><strong>Categoria de metas mais realizada:</strong>
                {{ $categoriaGoalTop ? $categoriaGoalTop->category->name : 'Nenhuma' }}
                </p>
                <p><strong>Turno mais produtivo:</strong> {{ ucfirst($turnoProdutivo) }}</p>
                <p><strong>Dia mais produtivo:</strong> {{ $diaProdutivo }}</p>
                <p><strong>Semana mais produtiva:</strong> {{ $semanaProdutiva }}</p>
                <p><strong>Mês mais produtivo:</strong> {{ $mesProdutivo }}</p>
            </div>
        </div>

    </div>
    @endsection