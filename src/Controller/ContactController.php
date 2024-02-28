<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/nous-contacter', name: 'contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, MailerService $mailer): Response
    {
        $form = $this->createForm(ContactType::class, [], [
            'local' => $request->getLocale()
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mailer->sendContactNotification(
                $form->get('nom')->getData() . ' ' . $form->get('prenom')->getData(),
                $form->get('email')->getData(),
                $form->get('sujet')->getData(),
                $form->get('message')->getData(),
            );

            $this->addFlash('success', "Votre message a bien été envoyer, vous aurez un retour dans un délais treès cours");
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
