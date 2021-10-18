<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\ArticleType;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration", name="administration")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository(Article::class);
        $listeArticle = $articleRepository->findAll();

        return $this->render('administration/index.html.twig', ['listeArticle' => $listeArticle]);
    }

    /**
     * @Route("/administration/modifier-article/{id}", name="modifier-article")
     */
    public function updateArticle(Request $request, int $id): Response
    {   
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository(Article::class);
        $articleModification = $articleRepository->find($id);

        if($articleModification === null){
            return $this->redirectToRoute('redirection-erreur');
        }

        $form = $this->createForm(ArticleType::class, $articleModification);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em->persist($articleModification);
                $em->flush();
                return $this->redirectToRoute('administration');
            }
        }

        return $this->render('administration/modificationArticle.html.twig', ['articleModification' => $articleModification, 'form' => $form->createView()]);
    }

    /**
     * @Route("/administration/suppression-artcicle/{id}", name="suppression-article")
     */
    public function deleteArticle(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $articleRepository = $em->getRepository(Article::class);
        $articleSuppression = $articleRepository->find($id);

        if($articleSuppression === null){
            return $this->redirectToRoute('redirection-erreur');
        }

        $em->remove($articleSuppression);
        $em->flush();

        return $this->redirectToRoute('administration');

    }

    /**
     * @Route("/administration/ajout-article", name="ajout-article")
     */
    public function createArticle(Request $request) 
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
                return $this->redirectToRoute('administration');
            }
        }
        
        return $this->render('administration/ajoutArticle.html.twig', ['article' => $article, 'form' => $form->createView()]);
    }

    /**
     * @Route("/administration/redirection-erreur", name="redirection-erreur")
     */
    public function redirectionError(): Response
    {
        return new Response('oui');
    }
}
