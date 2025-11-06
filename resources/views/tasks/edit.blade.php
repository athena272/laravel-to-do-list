@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"><i class="bi bi-pencil"></i> Editar Tarefa</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $task->title) }}" 
                               required 
                               maxlength="255"
                               placeholder="Digite o título da tarefa">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Máximo de 255 caracteres</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4"
                                  placeholder="Digite a descrição da tarefa (opcional)">{{ old('description', $task->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" 
                                name="status" 
                                required>
                            <option value="">Selecione o status</option>
                            <option value="pendente" {{ old('status', $task->status) == 'pendente' ? 'selected' : '' }}>Pendente</option>
                            <option value="concluída" {{ old('status', $task->status) == 'concluída' ? 'selected' : '' }}>Concluída</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> Criada em: {{ $task->created_at->format('d/m/Y H:i') }}
                            @if($task->updated_at != $task->created_at)
                                | Atualizada em: {{ $task->updated_at->format('d/m/Y H:i') }}
                            @endif
                        </small>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Atualizar Tarefa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

