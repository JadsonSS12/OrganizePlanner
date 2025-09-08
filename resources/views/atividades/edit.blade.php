@extends('layouts.app')

@section('content')
    <h1>Editar Atividade</h1>

    <form action="{{ route('atividades.update', $atividade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $atividade->nome }}" required>
        </div>

        <div>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required>{{ $atividade->descricao }}</textarea>
        </div>

        <div>
            <label for="category_id">Categoria:</label>
            <input type="number" name="category_id" id="category_id" value="{{ $atividade->category_id }}" required>
        </div>

        <div>
            <label for="data">Data:</label>
            <input type="date" name="data" id="data" value="{{ $atividade->data }}" required>
        </div>

        <div>
            <label for="hora_inicio">Hora de Início:</label>
            <input type="time" name="hora_inicio" id="hora_inicio" value="{{ $atividade->hora_inicio }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status" required>
                <option value="pendente" {{ $atividade->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="em andamento" {{ $atividade->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="concluída" {{ $atividade->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>

        <div>
            <label for="user_id">Usuário:</label>
            <input type="number" name="user_id" id="user_id" value="{{ $atividade->user_id }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection
