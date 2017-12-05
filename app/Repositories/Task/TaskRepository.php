<?php
namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface
{
    /** @var Task */
    private $task;

    public function __construct(Task $task)
    {
        $this->setTask($task);
    }

    public function save(Request $request)
    {
        $task = $this->getTask();
        $task->name = $request->name;
        $task->save();
    }

    public function getTasks()
    {
        return $this->getTask()->orderBy('name', 'asc')->get();
    }

    public function delete($id)
    {
        $this->getTask()->findOrFail($id)->delete();
    }

    /**
     * @return Task
     */
    private function getTask()
    {
        return $this->task;
    }

    /**
     * @param Task $task
     */
    private function setTask(Task $task)
    {
        $this->task = $task;
    }
}