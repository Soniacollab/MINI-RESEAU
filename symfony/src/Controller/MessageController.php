<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Message;
use App\Form\CommentType;
use App\Form\MessageType;
use App\Repository\CommentRepository;
use App\Repository\MessageRepository;
use App\Service\ImageUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;

use DateTimeImmutable;

#[Route('/messages', name: 'message_')]
class MessageController extends AbstractController
{
    private function denyAccessIfNotOwnerOrAdmin(Message $message): void
    {
        $currentUser = $this->getUser();
        $author = $message->getAuthor();

        if (!$currentUser || !$author) {
            throw $this->createAccessDeniedException("Vous n'avez pas les droits pour effectuer cette action.");
        }

        if (!$this->isGranted('ROLE_ADMIN') && $currentUser->getId() !== $author->getId()) {
            throw $this->createAccessDeniedException("Vous n'avez pas les droits pour effectuer cette action.");
        }
    }

    #[Route('/', name: 'list')]
    public function listMessages(MessageRepository $messageRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $messages = $messageRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('message/message.html.twig', [
            'messages' => $messages,
        ]);
    }

    /**
     * @throws ExceptionInterface
     */
    #[Route('/add', name: 'add')]
    #[IsGranted('ROLE_USER')]
    public function addMessage(
        Request $request,
        EntityManagerInterface $em,
        ImageUploader $imageUploader,
        MessageBusInterface $messageBus
    ): Response {
        $message = new Message();
        $message->setAuthor($this->getUser());

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setCreatedAt(new DateTimeImmutable());
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                if ($message->getImage()) {
                    $imageUploader->deleteFile($message->getImage());
                }
                $fileName = $imageUploader->uploadCover($imageFile, substr($message->getContent(), 0, 20));
                $message->setImage($fileName);
            }

            $em->persist($message);
            $em->flush();

            // Envoi du mail via Symfony Mailer (config MAILER_DSN)
            $email = (new Email())
                ->from('from@example.org')               // Adresse générique
                ->to($this->getUser()->getEmail())
                ->subject('Nouveau message posté !')
                ->text('Ton message a bien été publié sur Mini-Réseau !');

            // envoyer via Messenger
            $messageBus->dispatch(new SendEmailMessage($email));


            return $this->redirectToRoute('message_list');
        }

        return $this->render('message/add.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }


    #[Route('/edit/{id}', name: 'edit')]
    #[IsGranted('ROLE_USER')]
    public function editMessage(Message $message, Request $request, EntityManagerInterface $em, ImageUploader $imageUploader): Response
    {
        $this->denyAccessIfNotOwnerOrAdmin($message);

        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();
            if ($imageFile) {
                if ($message->getImage()) {
                    $imageUploader->deleteFile($message->getImage());
                }
                $fileName = $imageUploader->uploadCover($imageFile, substr($message->getContent(), 0, 20));
                $message->setImage($fileName);
            }

            $message->setUpdatedAt(new DateTimeImmutable());
            $em->flush();

            $this->addFlash('success', 'Message modifié avec succès !');

            return $this->redirectToRoute('message_list');
        }

        return $this->render('message/add.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    #[IsGranted('ROLE_USER')]
    public function deleteMessage(Message $message, EntityManagerInterface $em, ImageUploader $imageUploader): Response
    {
        $this->denyAccessIfNotOwnerOrAdmin($message);

        if ($message->getImage()) {
            $imageUploader->deleteFile($message->getImage());
        }

        $em->remove($message);
        $em->flush();

        $this->addFlash('success', 'Message supprimé avec succès !');

        return $this->redirectToRoute('message_list');
    }

    #[Route('/{id}', name: 'show')]
    public function showMessage(Message $message, Request $request, EntityManagerInterface $em, CommentRepository $commentRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        // Création du formulaire pour ajouter un commentaire
        $comment = new Comment();
        $comment->setAuthor($this->getUser());
        $comment->setMessage($message);
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new DateTimeImmutable());
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Commentaire ajouté !');

            return $this->redirectToRoute('message_show', ['id' => $message->getId()]);
        }

        // Récupérer les commentaires triés par date décroissante
        $comments = $commentRepository->findBy(['message' => $message], ['createdAt' => 'DESC']);

        return $this->render('message/details.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
            'comments' => $comments,
        ]);
    }
}
