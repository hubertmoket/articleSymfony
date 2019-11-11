<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticleRepository $repo)
    {
        // recuperation des données de la base de données

        //Gestion d'independance
        //je le mets en commentaire car index appelle deja ArticleRepository $repo
        //$repo = $this->getDoctrine()->getRepository(Article::class); //ici on précise l'entité choisi (Article)
        
        //$article=$repo->findOneByTitle('Le titre de l\'article');
        //$article=$repo->findByTitle('Le titre de l\'article');
        
        $articles = $repo->findAll(); //trouver tout les articles

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles'=>$articles
        ]);
    }
    //debut du script perso
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig');
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show(Article $article)
    {
        //ArticleRepository $repo, $id
        //$repo = $this->getDoctrine()->getRepository(Article::class); //ici on précise l'entité choisi (Article)
        
        //$article = $repo->find($id); //trouver l'article par son id
        
        return $this->render('blog/show.html.twig', [
            'article'=> $article
        ]);
    }
}
