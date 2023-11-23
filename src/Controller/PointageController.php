<?php

// src/Controller/PointageController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pointage;
use App\Form\PointageType;
use Doctrine\ORM\EntityManagerInterface;

class PointageController extends AbstractController
{
    /**
     * @Route("/pointage", name="pointage" ,methods={"GET", "POST"})
     */
    
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pointage = new Pointage();
        $form = $this->createForm(PointageType::class, $pointage);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pointage);
            $entityManager->flush();

            // Ajouter un message flash ou une redirection selon vos besoins
            return $this->redirectToRoute('pointage_success');
        }

        return $this->render('pointage/index.html.twig', [
            'pointageForm' => $form->createView(),
        ]);
    }

    // Vous pouvez ajouter d'autres méthodes ici si nécessaire
}
