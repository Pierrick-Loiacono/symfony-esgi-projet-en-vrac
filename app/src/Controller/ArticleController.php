<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{

    private string $prenom;

    public function __construct(string $prenom)
    {
        $this->prenom = $prenom;
    }

    #[Route('/article/{id}', name: 'app_article')]
    public function index(EntityManagerInterface $em, ArticleRepository $ar, int $id): Response
    {
        $article = $ar->findOneBy(['id' => $id ]);
        
        dd($this->prenom);

        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }
}
