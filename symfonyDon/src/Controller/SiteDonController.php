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

    /**
     * @Route("/site/don/{id}", name="annonce_show")
     */
// Page pour montrer une annonce
    public function show($id)
    {
        $repo =$this->getDoctrine()->getRepository(Annonce::class);

        $annonce = $repo->find($id);
        return $this->render('site_don/show.html.twig', [
            'annonce' => $annonce
        ]);  
    }

//     /**
//      * @Route("/site/don/new", name="annonce_new")
//      */
// // Page Poster une annonce
//     public function create(Request $request, ObjectManager $manager)
//     {
//       $annonce = new Annonce();

//     //Pour créer un form lié à mon annonce
//     $form = $this->createFormBuilder($annonce)
//                 // Configuation du formulaire
//                  ->add('titre', TextType::class,[
//                     'attr' => [
//                         'placeholder'=> "Titre de l'annonce"
//                     ]
//                  ])
//                  ->add('categorie', TextType::class,[
//                     'attr' => [
//                         'placeholder'=> "Catégorie de l'annonce"
//                     ] 
//                  ])
//                  ->add('description', TextareaType::class,[
//                     'attr' => [
//                         'placeholder'=> "Description de l'annonce"
//                     ]
//                 ])
//                 ->add('lieu', TextType::class,[
//                     'attr' => [
//                         'placeholder'=> "Lieu de l'annonce"
//                     ] 
//                  ])
//                  ->add('image', TextType::class,[
//                     'attr' => [
//                         'placeholder'=> "Image de l'annonce"
//                     ] 
//                  ])
//                 // resultat final avec la fonction getForm()
//                  ->getForm();
        
//         return $this-render('site_don/create.html.twig', [
//             'formAnnonce' => $form->createView()
//         ]);

    
//     }
}
