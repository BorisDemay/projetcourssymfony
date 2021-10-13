<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonce", name="annonce")
     */
    public function index(): Response
    {
        $annonces = ["Annonce 1 qui parle du changement dans l'edt",
            "Annonce 2 qui décrit l'inscription au prochain challenge de programmation",
            "Annonce 3 qui propose une rencontre avec des étudiants du département MMI", ];
        return $this->render('annonce/index.html.twig', [
            'controller_name' => 'AnnonceController',
            'annonces'=>$annonces,
        ]);
    }
}
