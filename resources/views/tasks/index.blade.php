@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1><i class="bi bi-list-task"></i> Lista de Tarefas</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nova Tarefa
    </a>
</div>

<!-- Filtros -->
<div class="filter-section">
    <form method="GET" action="{{ route('tasks.index') }}" class="row g-3">
        <div class="col-md-4">
            <label for="status" class="form-label">Filtrar por Status:</label>
            <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                <option value="">Todos</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="concluída" {{ request('status') == 'concluída' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>
        <div class="col-md-8 d-flex align-items-end">
            @if(request('status'))
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Limpar Filtro
                </a>
            @endif
        </div>
    </form>
</div>

<!-- Lista de Tarefas -->
@if($tasks->count() > 0)
    <div class="row">
        @foreach($tasks as $task)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="badge badge-status status-{{ $task->status == 'concluída' ? 'concluida' : 'pendente' }}">
                            {{ ucfirst($task->status) }}
                        </span>
                        <small class="text-muted">
                            <i class="bi bi-calendar"></i> {{ $task->created_at->format('d/m/Y') }}
                        </small>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        @if($task->description)
                            <p class="card-text text-muted">{{ Str::limit($task->description, 100) }}</p>
                        @else
                            <p class="card-text text-muted"><em>Sem descrição</em></p>
                        @endif
                    </div>
                    <div class="card-footer bg-white">
                        <div class="btn-group w-100" role="group">
                            <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-info btn-action" title="Ver detalhes">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary btn-action" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-action" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center">
        {{ $tasks->links() }}
    </div>
@else
    <div class="card">
        <div class="empty-state">
            <i class="bi bi-inbox"></i>
            <h3>Nenhuma tarefa encontrada</h3>
            <p>
                @if(request('status'))
                    Não há tarefas com o status selecionado.
                @else
                    Comece criando sua primeira tarefa!
                @endif
            </p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle d-block"></i> Criar Primeira Tarefa
            </a>
        </div>
    </div>
@endif
@endsection

