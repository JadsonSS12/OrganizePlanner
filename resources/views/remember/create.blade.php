@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0 p-2">
                        Criar lembrete
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('remembers.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label">Título</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Descrição</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Tipo</label>
                            <select name="typeRemember" class="form-control" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->value }}">{{ $type->value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <input type="checkbox" name="semanal" class="form-check-input" value="1">
                            <label class="form-check-label">Semanal</label>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Data e Hora</label>
                            <input type="datetime-local" name="dateTime" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end align-items-center gap-3">
                            <div>
                                <a class="btn btn-secondary btn-md px-4" href="{{ route('atividades.index') }}">
                                    Voltar
                                </a>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                Salvar
                            </button>
                        </div>
                    </form
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
