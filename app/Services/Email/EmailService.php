<?php
namespace App\Services\Email;

use App\Services\Contracts\EmailServiceInterface;
use Closure;
use Illuminate\Mail\Mailer;
use stdClass;

class EmailService implements EmailServiceInterface
{

    /** @var Mailer */
    private $mailer;
    /**
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->setMailer($mailer);
    }

    public function send(array $emails)
    {
        $template = 'emails.user-tasks';
        $data = $this->buildData();
        $this->getMailer()->send(
            $template,
            $data,
            function($message) use($emails, $data) {
                $this->buildMessage($emails, $message, $data);
            }
        );
    }

    private function buildData()
    {
        return [
            'email'=> 'martinn21@gmail.com',
            'name' => 'Martin Ramos',
            'subject' => 'Email Test'
        ];
    }

    /**
     * @param array $emails
     * @param Closure $message
     * @param array $data
     * @return Closure
     */
    private function buildMessage(array $emails, $message, $data)
    {
        $message->from($data['email'], $data['name']);

        $message->to('martinn21@gmail.com');
        //$message->to($users[0]->email);
        $emailToSend = [];
        foreach($emails as $idx => $email) {
            if ($idx == 0) {
                continue;
            }
            $emailToSend[] = $email;
        }

        $message->cc('mramos@tiempodevelopment.com');
        //$message->cc($emails);
        $message->subject($data['subject']);

        return $message;
    }

    /**
     * @return Mailer
     */
    private function getMailer()
    {
        return $this->mailer;
    }

    /**
     * @param Mailer $mailer
     */
    private function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
}