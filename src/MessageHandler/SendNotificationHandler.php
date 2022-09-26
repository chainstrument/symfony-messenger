<?php

namespace App\MessageHandler;

use App\Message\SendNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendNotificationHandler implements MessageHandlerInterface

{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(SendNotification $notification)
    {

       $this->mailer->send(
               (new \Swift_Message('[Demo] Notification'))
                   ->setFrom('hello@example.com')
                   ->setTo($notification->getEmail())
                   ->setBody(                '<h1>Notification</h1><p>'.$notification->getMessage().'</p>',
                   'text/html'
                )
            );

    }
}