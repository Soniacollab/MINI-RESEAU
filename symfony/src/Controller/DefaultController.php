<?php

namespace App\Controller;


use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'default_home', methods: ['GET'])]
    public function home(MessageRepository $messageRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $messages = $messageRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('message/message.html.twig', [
            'messages' => $messages,
        ]);
    }
}
