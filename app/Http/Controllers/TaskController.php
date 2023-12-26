<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Отобразить список задач
     */
    public function index()
    {
        return Inertia::render('Task/List', [
            'tasks' => TaskResource::collection(Task::orderBy('id', 'DESC')->get()),
        ]);
    }

    /**
     * Показать форму создания задачи
     */
    public function create()
    {
    }

    /**
     * Сохранить новую задачу
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create([
            ...$request->all(),
        ]);

        return Redirect::back()->with('success', 'Task created.');
    }

    /**
     * Показать задачу
     */
    public function show(Task $task)
    {
        return Inertia::render('Task/Edit', [
            'task' => new TaskResource($task),
        ]);
    }

    /**
     * Показать форму редактирования задачи
     */
    public function edit(Task $task, ?string $projectId = null)
    {
    }

    /**
     * Обновить задачу
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $updateData = $request->all();

        $task->update($updateData);

        return Redirect::back()->with('success', 'Task created.');
    }

    /**
     * Удалить задачу
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return Redirect::back()->with('success', 'Task created.');
    }
}
