@extends('layouts.app')

@section('content')

    @php
        $dias = ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'];

        $categoryColors = [
            'Trabalho' => 'bg-primary',      // Azul
            'Estudo' => 'bg-danger',      // Vermelho
            'Pessoal' => 'bg-warning text-dark', // Amarelo
            'Compras' => 'bg-info text-dark',        // Azul claro
        ];

    @endphp
    <div class="container">
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('atividades.create') }}">Criar atividade</a>
        </div>
        <div class="d-flex justify-content-center gap-4 text-sm py-4">
            <a class="btn btn-primary me-5"
                href="{{ route('atividades.index', ['week' => $semanaOffset - 1]) }}">
                Semana anterior
            </a>
            <span class="bg-info p-2 rounded"> Manhã (06–12)</span>
            <span class="bg-warning p-2 rounded">Tarde (13–17)</span>
            <span class="bg-dark text-white p-2 rounded"> Noite (18–23)</span>
            <a class="btn btn-primary ms-5"
                href="{{ route('atividades.index', ['week' => $semanaOffset + 1]) }}">
                Semana posterior
            </a>
        </div>

        <div class="border rounded-3 overflow-hidden shadow-sm">
        @for ($h = -1; $h < 37; $h++)
            <div class="row g-0 align-items-stretch {{ $h === -1 ? 'sticky-top bg-dark text-white' : '' }}"
                style="{{ $h === -1 ? 'z-index:1' : '' }}">
                <div class="col-1 border-end">
                    <div class="p-2 h-100 border-bottom {{ $h === -1 ? 'fw-semibold text-center' : 'small bg-dark d-flex justify-content-end align-items-center text-white' }}"
                        style="min-height:36px;">
                        {{ $h === -1 ? 'Hora' :  \Carbon\Carbon::createFromTime(6, 0)->addMinutes($h * 30)->format('H:i') }}
                    </div>
                </div>

@foreach (range(0, 6) as $dayIndex)
    <div class="col {{ $loop->last ? '' : 'border-end' }}">
        <div class="p-2 h-100 border-bottom" style="min-height:36px;">
            @if ($h === -1)
                <div class="fw-semibold text-center">{{ $dias[$dayIndex] . ' - '. $datas_semana[$dayIndex]->format('d/m') }}</div>
            @else
                @foreach (data_get($atividades_agrupadas, "{$dayIndex}.{$h}", collect()) as $atividade)
                    @php
                        $categoryName = data_get($atividade, 'categoria.name');

                        $colorClass = $categoryColors[$categoryName] ?? 'bg-secondary';
                    @endphp

                    <a class="badge {{ $colorClass }} text-truncate me-1 mb-1 d-inline-block"
                        href="{{ route('atividades.show', $atividade->id) }}" title="{{ $atividade->nome }} ({{ $categoryName }})"
                        style="max-width:100%;">
                        {{ $atividade->nome }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endforeach
            </div>
        @endfor
        </div>


        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
            @if ($lembretesProximos->isNotEmpty())
                @foreach ($lembretesProximos as $lembrete)
                    <div class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-bell-fill" style="color:black;"></i> <strong>Atenção!</strong> Seu lembrete
                                "<strong>{{ $lembrete->title }}</strong>" está próximo de acontecer
                                <strong>{{ \Carbon\Carbon::parse($lembrete->dateTime)->format('d/m/Y H:i') }}</strong>.
                            </div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Você não tem lembretes próximos.
                        </div>
                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
