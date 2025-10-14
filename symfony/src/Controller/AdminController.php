<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

//#[Route('/admin')]
//#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
//    #[Route('/dashboard', name: 'admin_dashboard', methods: ['GET'])]
//    public function dashboard(BookSearch $bookSearch, Request $request): Response
//    {
//        $data = $bookSearch->getBooksFromRequest($request);
//
//        return $this->render('admin/dashboard.html.twig', $data);
//    }
}
