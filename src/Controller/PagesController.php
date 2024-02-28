<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagesController extends AbstractController
{
    #[Route('/condition-utilisation', name: 'page_conditions')]
    public function conditions(): Response
    {
        return $this->render('pages/conditions.html.twig', [
            
        ]);
    }

    #[Route('/faqs', name: 'page_faqs')]
    public function faqs(): Response
    {
        return $this->render('pages/faqs.html.twig', [
            
        ]);
    }

    #[Route('/politique-de-confidentialites', name: 'page_politiques')]
    public function politique(): Response
    {
        return $this->render('pages/politiques.html.twig', [
            
        ]);
    }
}
