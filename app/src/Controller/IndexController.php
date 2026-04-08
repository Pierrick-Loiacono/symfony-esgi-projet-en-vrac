<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return new Response("Hello première route");
    }

    // #[Route('/index/{slug}-{id}', name: 'app_index_slug', methods: ['GET'])]
    // public function test(Request $request): Response
    // {
    //     dd($request);
    //     return new Response("Hello première route");
    // }
}
