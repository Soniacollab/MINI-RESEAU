<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\MessageRepository;
use App\Service\ImageUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;

class MessageController extends AbstractController
{
    #[Route('/messages', name: 'messages_list')]
    public function displayMessages(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();

        return $this->render('default/message.html.twig', [
            'messages' => $messages,
        ]);
    }

    #[Route('/message/{id}', name: 'message_show')]
    public function displayMessageById(MessageRepository $messageRepository, int $id): Response
    {
        $message = $messageRepository->find($id);

        if (!$message) {
            throw $this->createNotFoundException('Message non trouvé');
        }

        return $this->render('message/details.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/message/add', name: 'message_add')]
    public function addMessage(
        Request $request,
        EntityManagerInterface $em,
        ImageUploader $imageUploader
    ): Response {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setAuthor($this->getUser());
            $message->setCreatedAt(new DateTimeImmutable());

            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                // Nom de fichier = slug du contenu
                $fileName = $imageUploader->uploadCover($imageFile, substr($message->getContent(), 0, 20));
                $message->setImage($fileName);
            }

            $em->persist($message);
            $em->flush();

            return $this->redirectToRoute('messages_list');
        }

        return $this->render('message/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/message/{id}/delete', name: 'message_delete')]
    public function deleteMessage(
        MessageRepository $messageRepository,
        ImageUploader $imageUploader,
        EntityManagerInterface $em,
        int $id
    ): Response {
        $message = $messageRepository->find($id);

        if (!$message) {
            throw $this->createNotFoundException('Message non trouvé');
        }

        // Supprimer l'image si elle existe
        if ($message->getImage()) {
            $imageUploader->deleteFile($message->getImage());
        }

        $em->remove($message);
        $em->flush();

        return $this->redirectToRoute('messages_list');
    }
}
