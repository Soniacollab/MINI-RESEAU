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
        $messages = $messageRepository->findAll();

        return $this->render('default/home.html.twig', [
            'messages' => $messages,
        ]);
    }
}
