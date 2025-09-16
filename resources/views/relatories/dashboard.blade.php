    @extends('layouts.app')

    @section('content')
    <div class="container py-4 text-white">
    <h1 class="mb-4">📊 Relatório Geral</h1>

    <div class="row">

        {{-- Coluna da Esquerda (Metas e Atividades) --}}
        <div class="col-md-4">

            <div class="card shadow-sm rounded-3 mb-4">
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

        {{-- Coluna da Direita (Insights) --}}
        <div class="col-md-8">
            <div class="card shadow-sm rounded-3 h-100">
                <div class="card-body">
                    <h4 class="card-title">💡 Insights</h4>
                    <p><strong>Categoria de tarefas mais usada:</strong>{{ $categoriaTop ? $categoriaTop->categoria->name : 'Nenhuma' }}</p>
                    <p><strong>Categoria de metas mais realizada:</strong>{{ $categoriaGoalTop ? $categoriaGoalTop->category->name : 'Nenhuma' }}</p>
                    <p><strong>Turno mais produtivo:</strong> {{ ucfirst($turnoProdutivo) }}</p>
                    <p><strong>Dia mais produtivo:</strong> {{ $diaProdutivo }}</p>
                    <p><strong>Semana mais produtiva:</strong> {{ $semanaProdutiva }}</p>
                    <p><strong>Mês mais produtivo:</strong> {{ $mesProdutivo }}</p>
                </div>
            </div>
        </div>
    </div>
    
        <!-- Gráfico -->
        <div class="card shadow-sm rounded-3">
            <div class="card-body">
                <h4 class="card-title">📈 Evolução de Relatórios</h4>
                <canvas id="relatoriesChart" height="100"></canvas>
            </div>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('relatoriesChart').getContext('2d');

            fetch("{{ route('relatories.chart') }}")
                .then(response => response.json())
                .then(data => {
                    const labels = data.map(item => item.date);
                    const values = data.map(item => item.total);

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Tarefas concluídas por Dia',
                                data: values,
                                fill: true,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                },
                                tooltip: {
                                    mode: 'index',
                                    intersect: false,
                                }
                            },
                            scales: {
                                x: { title: { display: true, text: 'Data' }},
                                y: { title: { display: true, text: 'Total' }}
                            }
                        }
                    });
                });
        });
        </script>

    <div class="card shadow-sm rounded-3">
        <div card shadow-sm rounded-3>
            <h4 class="card-title">📈 Gráfico de Metas por Status</h1>
            <div style="width: 100%; margin: auto;">
                <canvas id="goalStatusChart"></canvas>
            </div>
        </div>
    </div>

    <script>
        fetch("{{ route('relatories.goals_status_chart') }}")
            .then(response => response.json())
            .then(data => {
                new Chart(document.getElementById("goalStatusChart"), {
                    type: 'pie',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Status das Metas',
                            data: data.data,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(255, 206, 86, 0.6)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            });
    </script>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush

    </div>
    @endsection