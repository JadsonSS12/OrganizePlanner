@extends('layouts.app')

@section('content')
    <div class="container-fluid">

            <div>
                <button class="btn">Primeiro</button>
                <button class="btn">Segundo</button>
            </div>
           <div class="d-flex justify-content-center gap-4 text-sm">
                    <span class="bg-info p-2 rounded"> Manhã (05–12)</span>
                    <span class="bg-warning p-2 rounded">Tarde (13–17)</span>
                    <span class="bg-dark text-white p-2 rounded"> Noite (18–22)</span>
            </div>

                <div class="row">
                {{-- Coluna das horas --}}
                <div class="col-md-1 border-end">
                    @for ($h = 0; $h < 24; $h++)
                        <div class="py-2 small text-end">
                            {{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:00
                        </div>
                    @endfor
                </div>

                {{-- Coluna das atividades --}}
                <div class="col-md-11">
                    @for ($h = 0; $h < 24; $h++)
                        <div class="py-2 border-bottom" style="min-height: 36.5px;">
                            @foreach ($atividades as $atividade)
                                @php
                                    $startHour = (int) \Carbon\Carbon::parse($atividade->hora_inicio)->format('H');
                                @endphp

                                @if ($startHour === $h)
                                    <span class="badge bg-primary me-1">
                                        {{ $atividade->descricao }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>
        
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
            @if ($lembretesProximos->isNotEmpty())
                @foreach ($lembretesProximos as $lembrete)
                    <div class="toast align-items-center text-bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-bell-fill" style="color:black;"></i> <strong>Atenção!</strong> Seu lembrete "<strong>{{ $lembrete->title }}</strong>" está próximo de acontecer <strong>{{ \Carbon\Carbon::parse($lembrete->dateTime)->format('d/m/Y H:i') }}</strong>.
                            </div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="toast align-items-center text-bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Você não tem lembretes próximos.
                        </div>
                        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection