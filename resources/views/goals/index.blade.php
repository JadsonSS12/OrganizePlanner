@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-3">
        <div class="col-md-6 text-white">
            <h1>🎯 Minhas Metas</h1>
        </div>
        <div class="col-md-6 text-md-end">
            <a href="{{ route('goals.create') }}" class="btn btn-secondary">
                <i class="fas fa-plus"></i> Criar Nova Meta
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Período</th>
                            <th>Status</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($goals as $goal)
                            <tr>
                                <td>{{ $goal->description }}</td>
                                <td>
                                    <span class="badge bg-secondary">{{ $goal->category->name ?? 'Sem Categoria' }}</span>
                                </td>
                                <td>{{ ucfirst($goal->period) }}</td>
                                <td>
                                    {{-- Assumindo que o seu Enum StatusGoal tem uma propriedade 'name' e 'value' --}}
                                    <span class="badge" style="background-color: {{ $goal->status->color() ?? '#6c757d' }};">
                                        {{ $goal->status->value }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('goals.edit', $goal) }}" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('goals.destroy', $goal) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta meta?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhuma meta encontrada. Que tal criar uma nova?</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection