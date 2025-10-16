<?php

namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard', methods: ['GET'])]
    public function dashboard(MessageRepository $messageRepository): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $messages = $messageRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/dashboard.html.twig', [
            'messages' => $messages,
        ]);
    }


    #[Route('/users', name: 'admin_users')]
    public function listUsers(UserRepository $userRepo): Response
    {
        $users = $userRepo->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }
    #[Route('/user/delete/{id}', name: 'admin_user_delete')]
    public function deleteUser(User $user, EntityManagerInterface $em): RedirectResponse
    {
        // Empêcher l'admin de se supprimer lui-même
        if ($user === $this->getUser()) {
            $this->addFlash('danger', 'Vous ne pouvez pas vous supprimer vous-même !');
            return $this->redirectToRoute('admin_users');
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('success', 'Utilisateur supprimé avec succès !');
        return $this->redirectToRoute('admin_users');
    }
}
