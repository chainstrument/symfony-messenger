<?php

namespace App\Controller;

use App\Message\SendNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

class SignUpController extends AbstractController
{
    /**
     * @Route("/signup", name="signup")
     */
    public function index(Request $request, MessageBusInterface $bus)
    {
        // ...

        // SendNotificationHandler sera automatiquement appelé
        $bus->dispatch(new SendNotification('Salut le nouveau !',$request->get('email')));

     
    }
}