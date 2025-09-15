@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #2c2c2c;
            color: #dcdcdc;
        }
        .calendar-container {
            padding: 20px;
        }
        .calendar-header {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
            margin-bottom: 20px;
            font-family: 'Script MT Bold', sans-serif; /* Aproximação da fonte */
        }
        .day-column {
            background-color: #1a1a1a;
            border: 1px solid #444;
            border-radius: 8px;
            padding: 10px;
            margin: 0 5px;
            text-align: center;
        }
        .day-header {
            font-size: 1.2em;
            padding-bottom: 10px;
            border-bottom: 1px solid #444;
        }
        .time-slot {
            padding: 8px 0;
            border-bottom: 1px solid #333;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .time-label {
            font-size: 0.8em;
            color: #aaa;
            margin-bottom: 5px;
        }
        .activity-badge {
            background-color: #0d6efd; /* bg-primary */
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>

    <div class="container-fluid calendar-container">

         @if(isset($remembers) && !$remembers->isEmpty())
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> Você possui lembretes pendentes.
                <a href="{{ route('remembers.index') }}" class="alert-link">Clique aqui para vê-los</a>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex align-items-center justify-content-between my-4">
            <a href="#" class="btn btn-dark"><</a>
            <h2 class="calendar-header">Agosto</h2>
            <a href="#" class="btn btn-dark">></a>
        </div>

        <div class="row g-1">
            @php
                $weekdays = ['Domingo 03', 'Segunda 04', 'Terça 05', 'Quarta 06', 'Quinta 07', 'Sexta 08', 'Sábado 09'];
            @endphp

            @foreach($weekdays as $day)
                <div class="col day-column">
                    <div class="day-header mb-3">
                        {{ $day }}
                    </div>
                    @for($h = 8; $h <= 21; $h++)
                        @php
                            $minuteSteps = [0, 10, 20];
                            if ($h >= 19 && $h <= 21) {
                                $minuteSteps = [0, 1, 2];
                            }
                        @endphp
                        @foreach($minuteSteps as $m)
                            <div class="time-slot">
                                <div class="time-label">
                                    {{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($m * ($h >= 19 && $h <= 21 ? 1 : 10), 2, '0', STR_PAD_LEFT) }}
                                </div>
                                @php
                                    // Simula a lógica de exibir atividades do index.blade.php
                                    // A variável $atividades precisaria ser passada para esta view pelo controller
                                    if (isset($atividades)) {
                                        foreach ($atividades as $atividade) {
                                            $startHour = (int) \Carbon\Carbon::parse($atividade->hora_inicio)->format('H');
                                            $startMinute = (int) \Carbon\Carbon::parse($atividade->hora_inicio)->format('i');
                                            if ($startHour === $h && $startMinute === $m * ($h >= 19 && $h <= 21 ? 1 : 10)) {
                                                echo '<span class="activity-badge">' . $atividade->descricao . '</span>';
                                            }
                                        }
                                    } else {
                                        // Exemplo de placeholder se não houver dados de atividade
                                        // A imagem mostra a palavra "Atividade" em todos os horários.
                                        echo '<span class="activity-badge">Atividade</span>';
                                    }
                                @endphp
                            </div>
                        @endforeach
                    @endfor
                </div>
            @endforeach
        </div>
        
    </div>
@endsection