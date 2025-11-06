@extends('layouts.app')

@section('title', 'Detalhes da Tarefa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="bi bi-eye"></i> Detalhes da Tarefa</h4>
                <span class="badge badge-status status-{{ $task->status == 'concluída' ? 'concluida' : 'pendente' }}">
                    {{ ucfirst($task->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="text-primary">{{ $task->title }}</h5>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Descrição:</label>
                    <p class="text-muted">
                        @if($task->description)
                            {{ $task->description }}
                        @else
                            <em>Sem descrição</em>
                        @endif
                    </p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status:</label>
                        <p>
                            <span class="badge badge-status status-{{ $task->status == 'concluída' ? 'concluida' : 'pendente' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Data de Criação:</label>
                        <p class="text-muted">
                            <i class="bi bi-calendar"></i> {{ $task->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>

                @if($task->updated_at != $task->created_at)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Última Atualização:</label>
                        <p class="text-muted">
                            <i class="bi bi-clock-history"></i> {{ $task->updated_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                @endif
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>
                    <div>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

