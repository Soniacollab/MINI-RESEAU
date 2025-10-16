<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/comments', name: 'comment_')]
class CommentController extends AbstractController
{
    // Vérifie que l'utilisateur est l'auteur ou admin
    private function denyAccessIfNotOwnerOrAdmin(Comment $comment): void
    {
        $currentUser = $this->getUser();
        $author = $comment->getAuthor();

        if (!$currentUser || !$author) {
            throw $this->createAccessDeniedException("Vous n'avez pas les droits pour effectuer cette action.");
        }

        if (!$this->isGranted('ROLE_ADMIN') && $currentUser->getId() !== $author->getId()) {
            throw $this->createAccessDeniedException("Vous n'avez pas les droits pour effectuer cette action.");
        }
    }

    // Modifier un commentaire
    #[Route('/edit/{id}', name: 'edit')]
    #[IsGranted('ROLE_USER')]
    public function editComment(Comment $comment, EntityManagerInterface $em, Request $request): Response
    {
        $this->denyAccessIfNotOwnerOrAdmin($comment);

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setUpdatedAt(new DateTimeImmutable());
            $em->flush();
            $this->addFlash('success', 'Commentaire modifié avec succès !');

            return $this->redirectToRoute('message_show', [
                'id' => $comment->getMessage()->getId()
            ]);
        }

        //  Affiche le formulaire si pas encore soumis
        return $this->render('comment/edit.html.twig', [
            'form' => $form->createView(),
            'comment' => $comment,
        ]);
    }


    // Supprimer un commentaire
    #[Route('/delete/{id}', name: 'delete')]
    #[IsGranted('ROLE_USER')]
    public function deleteComment(Comment $comment, EntityManagerInterface $em): Response
    {
        $this->denyAccessIfNotOwnerOrAdmin($comment);

        $messageId = $comment->getMessage()->getId();
        $em->remove($comment);
        $em->flush();

        $this->addFlash('success', 'Commentaire supprimé !');

        return $this->redirectToRoute('message_show', ['id' => $messageId]);
    }
}
