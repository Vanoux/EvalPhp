<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Annonce;
use App\Repository\AnnonceRepository;


class SiteDonController extends AbstractController
{
    /**
     * @Route("/site/don", name="site_don")
     */
// Page Annonces
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

    /**
     * @Route("/", name="home")
     */
// Page Accueil
    public function home()
    {
        return $this->render('site_don/home.html.twig');
    }
}
