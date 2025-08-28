@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Lista de Lembretes</h1>
    <a href="{{ route('remembers.create') }}" class="btn btn-primary mb-3">Novo Lembrete</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Semanal</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($remembers as $remember)
            <tr>
                <td>{{ $remember->title }}</td>
                <td>{{ $remember->description }}</td>
                <td>{{ $remember->typeRemember->value }}</td>
                <td>{{ $remember->semanal ? 'Sim' : 'Não' }}</td>
                <td>{{ $remember->dateTime }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
