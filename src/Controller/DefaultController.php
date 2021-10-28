<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\InfoUtilisateur;
use App\Form\InfoUtilisateurType;

class DefaultController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository(Article::class);
        $listeArticle = $articleRepository->findAll();

        return $this->render('default/index.html.twig', ['listeArticle' => $listeArticle]);
    }

    /**
     * @Route("/article/{id}", name="article")
     */
    public function readArticle(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository(Article::class);
        $readArticle = $articleRepository->find($id);

        return $this->render('default/readArticle.html.twig', ['article' => $readArticle]);
    }

    /**
     * @Route("/je-souhaite-sauver-des-vies", name="infoUtilisateur")
     */
    public function infoUtilisateur(Request $request)
    {
        $utilisateur = new InfoUtilisateur();
        $form = $this->createForm(InfoUtilisateurType::class, $utilisateur);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();
                return $this->redirectToRoute('accueil');
            }
        }
        
        return $this->render('default/solidaire.html.twig', ['utilisateur' => $utilisateur, 'form' => $form->createView()]);
    }

    /**
     * @Route("/avancés-de-la-campagne-de-vaccination", name="avance-vaccination")
     */
    public function avanceeVacinnation(): Response
    {
        return $this->render('default/avance.html.twig');
    }

    /**
     * @Route("/facts-vaccination", name="facts-vaccination")
     */
    public function factsVaccination(): Response
    {
        return $this->render('default/strategie.html.twig');
    }

    /**
     * @Route("/", name="redirection")
     */
    public function redirection(){
        return $this->redirectToRoute("accueil");
    }

    /**
     * @Route("/centre-de-vaccination-proche", name="oui")
     */
    public function voeuxVaccination(){
        return $this->render('default/centre-vaccination.html.twig');
    }

    /**
     * @Route("/", name="home")
     */
    public function homepageRedirection(){
        return $this->redirectToRoute("accueil");
    }

}
