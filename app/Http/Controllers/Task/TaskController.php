<?php
namespace App\Http\Controllers\Task;


use App\Services\Contracts\TaskServiceInterface;
use App\Services\Task\TaskService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /** @var TaskService */
    private $taskService;

    /**
     * @param TaskServiceInterface $taskService
     */
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->setTaskService($taskService);
    }

    public function index()
    {
        $tasks = $this->getTaskService()->getTasks();
        return view('tasks.tasks', [
            'tasks' => $tasks
        ]);
    }


    public function save(Request $request)
    {
        $this->getTaskService()->validate($request);
        $this->getTaskService()->save($request);

        return redirect('/task');
    }

    public function delete($id)
    {
        $this->getTaskService()->delete($id);
        return redirect('/task');
    }

    /**
     * @return TaskService
     */
    private function getTaskService()
    {
        return $this->taskService;
    }

    /**
     * @param TaskServiceInterface $taskService
     */
    private function setTaskService(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }
}
