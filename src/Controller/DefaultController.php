<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

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
}
