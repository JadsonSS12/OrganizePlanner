@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatórios</h1>
    <canvas id="relatoryChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch("{{ route('relatories.chart') }}")
        .then(res => res.json())
        .then(data => {
            const labels = data.map(d => d.date);
            const values = data.map(d => d.total);

            new Chart(document.getElementById("relatoryChart"), {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Valor total",
                        data: values,
                        backgroundColor: "rgba(54, 162, 235, 0.6)"
                    }]
                }
            });
        });
</script>
@endsection
