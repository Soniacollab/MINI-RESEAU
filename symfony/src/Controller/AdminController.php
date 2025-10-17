<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher) {}

    #[Route('/users', name: 'admin_users')]
    public function listUsers(UserRepository $userRepo): Response
    {
        $users = $userRepo->findAll();
        return $this->render('admin/users.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/user/new', name: 'admin_user_new')]
    public function createUser(Request $request, EntityManagerInterface $em): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['is_edit' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $existingUser = $em->getRepository(User::class)->findOneBy([
                'email' => $user->getEmail()
            ]);

            if ($existingUser) {
                $this->addFlash('danger', 'Cet email est déjà utilisé par un autre utilisateur.');
                return $this->render('admin/user_form.html.twig', [
                    'form' => $form->createView(),
                    'editMode' => false
                ]);
            }

            $plainPassword = $form->get('plainPassword')->getData();
            $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'Utilisateur créé avec succès !');
            return $this->redirectToRoute('admin_users');
        }


        return $this->render('admin/user_form.html.twig', [
            'form' => $form->createView(),
            'editMode' => false
        ]);
    }

    #[Route('/user/edit/{id}', name: 'admin_user_edit')]
public function editUser(User $user, Request $request, EntityManagerInterface $em): Response
{
    $form = $this->createForm(UserType::class, $user, ['is_edit' => true]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Vérifier si l'email existe déjà pour un autre utilisateur
        $existingUser = $em->getRepository(User::class)->findOneBy(['email' => $user->getEmail()]);
        if ($existingUser && $existingUser->getId() !== $user->getId()) {
            $this->addFlash('danger', 'Cet email est déjà utilisé par un autre utilisateur.');
            return $this->redirectToRoute('admin_user_edit', ['id' => $user->getId()]);
        }

        // Gestion du mot de passe si un nouveau est fourni
        $plainPassword = $form->get('plainPassword')->getData();
        if ($plainPassword) {
            $user->setPassword($this->passwordHasher->hashPassword($user, $plainPassword));
        }

        $em->flush();
        $this->addFlash('success', 'Utilisateur modifié avec succès !');
        return $this->redirectToRoute('admin_users');
    }

    return $this->render('admin/user_form.html.twig', [
        'form' => $form->createView(),
        'editMode' => true
    ]);
}


    #[Route('/user/delete/{id}', name: 'admin_user_delete')]
    public function deleteUser(User $user, EntityManagerInterface $em): Response
    {
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
