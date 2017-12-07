<?php

namespace App\Console\Commands;

use App\Services\Contracts\EmailServiceInterface;
use App\Services\Contracts\TaskServiceInterface;
use App\Services\Email\EmailService;
use App\Services\Task\TaskService;
use Illuminate\Console\Command;

class EmailUserTasks extends Command
{
    //  * * * * * php /path/to/artisan schedule:run 1>> /dev/null 2>&1
    /**
     *
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails-user-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send e-mails to users that have tasks';

    /** @var TaskService */
    private $taskService;

    /** @var EmailService */
    private $emailService;

    /**
     * Create a new command instance.
     *
     * @param TaskServiceInterface $taskService
     * @param EmailServiceInterface $emailService
     */
    public function __construct(TaskServiceInterface $taskService, EmailServiceInterface $emailService)
    {
        parent::__construct();

        $this->setTaskService($taskService);
        $this->setEmailService($emailService);
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = $this->getTaskService()->getTasksByGroupId(10);
        $emails = $this->getEmails($tasks);
        $this->getEmailService()->send($emails);
    }

    private function getEmails($tasks)
    {
        $emails = [];
        foreach ($tasks as $task)
        {
            $emails[] = $task->email;
        }

        return $emails;
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

    /**
     * @return EmailService
     */
    private function getEmailService()
    {
        return $this->emailService;
    }

    /**
     * @param EmailServiceInterface $emailService
     */
    private function setEmailService(EmailServiceInterface $emailService)
    {
        $this->emailService = $emailService;
    }
}
