@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Lembrete</h1>
    <form action="{{ route('remembers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipo</label>
            <select name="typeRemember" class="form-control" required>
                @foreach($types as $type)
                    <option value="{{ $type->value }}">{{ $type->value }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="semanal" class="form-check-input" value="1">
            <label class="form-check-label">Semanal</label>
        </div>

        <div class="mb-3">
            <label class="form-label">Data e Hora</label>
            <input type="datetime-local" name="dateTime" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
