@extends('layouts.app')

@section('content')
    <h1>Detalhes da Atividade</h1>

    <p><strong>ID:</strong> {{ $atividade->id }}</p>
    <p><strong>Nome:</strong> {{ $atividade->nome }}</p>
    <p><strong>Descrição:</strong> {{ $atividade->descricao }}</p>

    <a href="{{ route('atividades.edit', $atividade->id) }}" class="btn btn-primary">Editar</a>

    <form action="{{ route('atividades.destroy', $atividade->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
@endsection
