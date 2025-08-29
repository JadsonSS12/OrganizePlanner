@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <button class="btn">Primeiro</button>
                <button class="btn">Segundo</button>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('atividades.create')}}">Criar atividade</a>
            </div>
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

@endsection