<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{


    #[Route('/home', name: 'home_index')]
    public function index(): Response
    {

        $etudiants = [
            'ghislene' => [
                'classe' => 'B3'
            ],
            'jey' => [
                'classe' => 'B3'
            ],
        ];

        return $this->render('home/index.html.twig', [
        ]);
    }

    
}
