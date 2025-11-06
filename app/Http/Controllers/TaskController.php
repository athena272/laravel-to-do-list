<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Exibe uma lista paginada das tarefas.
     */
    public function index(Request $request)
    {
        $query = Task::query();

        // Filtro por status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ordenação por data de criação (mais recentes primeiro)
        $query->latest();

        // Paginação
        $tasks = $query->paginate(10)->withQueryString();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Mostra o formulário para criar uma nova tarefa.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Armazena uma nova tarefa no banco de dados.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Exibe a tarefa especificada.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Mostra o formulário para editar a tarefa especificada.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Atualiza a tarefa especificada no banco de dados.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove a tarefa especificada do banco de dados (soft delete).
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarefa excluída com sucesso!');
    }

    /**
     * Restaura uma tarefa excluída (soft delete).
     */
    public function restore($id)
    {
        $task = Task::withTrashed()->findOrFail($id);
        $task->restore();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarefa restaurada com sucesso!');
    }
}

