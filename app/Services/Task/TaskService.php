<?php
namespace App\Services\Task;

use App\Repositories\Contracts\TaskRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Services\Contracts\TaskServiceInterface;
use App\Validators\Contracts\ValidatorInterface;
use App\Validators\Task\TaskValidator;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface
{
    /** @var TaskValidator */
    private $taskValidator;

    /** @var TaskRepository */
    private $taskRepository;

    public function __construct(ValidatorInterface $taskValidator, TaskRepositoryInterface $taskRepository)
    {
        $this->setTaskValidator($taskValidator);
        $this->setTaskRepository($taskRepository);
    }

    public function validate(Request $request)
    {
        $this->getTaskValidator()->validate($request);
    }

    public function save(Request $request)
    {
        $this->getTaskRepository()->save($request);
    }

    public function getTasks()
    {
        return $this->getTaskRepository()->getTasks();
    }

    public function delete($id)
    {
        $this->getTaskRepository()->delete($id);
    }

    /**
     * @return TaskValidator
     */
    private function getTaskValidator()
    {
        return $this->taskValidator;
    }

    /**
     * @param ValidatorInterface $taskValidator
     */
    private function setTaskValidator(ValidatorInterface $taskValidator)
    {
        $this->taskValidator = $taskValidator;
    }

    /**
     * @return TaskRepository
     */
    private function getTaskRepository()
    {
        return $this->taskRepository;
    }

    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    private function setTaskRepository(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
}