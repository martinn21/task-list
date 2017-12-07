<?php
namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getTasksByGroupId($groupId)
    {
        $query = DB::table('tasks AS t')
            ->selectRaw('t.name as task_name, u.username as username, u.email as email, g.name')
            ->join('user_groups AS ug', 't.user_id', '=', 'ug.user_id')
            ->join('groups AS g', 'g.id', '=', 'ug.group_id')
            ->join('users as u', 'u.id', '=', 'ug.user_id')
            ->where('g.id', $groupId);
        //dd($query->toSql());
        return $query->get();
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