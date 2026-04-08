<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

final class StudentController extends AbstractController
{

    #[Route('/student', name: 'app_student_list')]
    public function list(): Response
    {

        $students = $this->list_students();

        return $this->render('student/list.html.twig', [
            'students' => $students,
        ]);
    }

    #[Route('/student/{nom}', name: 'app_student')]
    public function index(string $nom): Response
    {

        $students = $this->list_students();

        if (!isset($students[$nom])) {
            throw new NotFoundHttpException('Le profil du membre "' . $nom . '" n\'a pas été trouvé.');
        }

        $studentData = $students[$nom];

        return $this->render('student/index.html.twig', [
            'nom' => $nom,
            'classe' => $studentData['classe'],
            'alternance' => $studentData['alternance'],
        ]);
    }

    public function list_students(){
        return [
            'geraldine' => [
                'classe' => 'B3',
                'alternance' => 'Chez Didier',
            ],
            'ghislene' => [
                'classe' => 'B3',
                'alternance' => 'CapGemini',
            ],
            'jeyson' => [
                'classe' => 'B3',
                'alternance' => 'ICE',
            ],
            'clement' => [
                'classe' => 'B3',
                'alternance' => 'Nature & Découverte',
            ],
        ];
    }
}










































        // if (!isset($teamMembers[$memberNameLower])) {
        //     throw new NotFoundHttpException('Le profil du membre "' . $name . '" n\'a pas été trouvé.');
        // }