<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'nom' => 'Loiacono',
            'prenom' => 'Pierrick',
        ]);
    }

    // #[Route('/produit/{id}', name: 'produit_show')]
    // public function show(Produit $produit): Response
    // {
    //     return $this->render('index/produit.html.twig', [
    //         'variable_twig' => 'Texte dans la variable',
    //         'deuxieme_twig' => 'Ici aussi',
    //     ]);
    // }

    #[Route('/produit/list', name: 'produit_list', priority: 2)]
    public function list(): Response
    {
        return $this->render('index/produits.html.twig', [
        ]);
    }
}
