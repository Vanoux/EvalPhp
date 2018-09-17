<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;
use App\Repository\AnnonceRepository;


class SiteDonController extends AbstractController
{
    /**
     * @Route("/site/don", name="site_don")
     */
    public function index()
    {
        //Apel Doctrine Pour selectionner les données de la class / table Article
        $repo = $this->getDoctrine()->getRepository(Annonce::class); 

        $annonces = $repo->findAll();

        return $this->render('site_don/index.html.twig', [
            'controller_name' => 'SiteDonController',
            'annonces' => $annonces
        ]);
    }
}
