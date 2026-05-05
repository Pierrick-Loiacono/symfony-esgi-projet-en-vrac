<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategorieController extends AbstractController
{

    #[Route('/categorie/{id}', name: 'app_categorie')]
    public function index(EntityManagerInterface $em, CategorieRepository $cat, int $id): Response
    {
        $categorie = $cat->findOneBy(['id' => $id ]);
        
        return $this->render('categorie/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
