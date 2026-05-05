<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProduitController extends AbstractController
{

    #[Route('/produits', name: 'app_produits')]
    public function index(ProduitRepository $produitRepository): Response
    {
        
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }


    #[Route('/create_produit', name: 'app_create_produit')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($produit);
            $em->flush();
            $this->addFlash('success', 'Produit créé !');

            return $this->redirectToRoute('app_produits');
        }

        return $this->render('produit/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
