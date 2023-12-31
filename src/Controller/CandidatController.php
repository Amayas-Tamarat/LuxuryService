<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidat')]
class CandidatController extends AbstractController
{

    #[Route('/profile', name: 'app_candidat', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response    
    {
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat', [], Response::HTTP_SEE_OTHER);
        } 

        return $this->render('candidat/profile.html.twig', 
        [
            'candidat' => $candidat,
            'formProfile' => $form,
        ]);
    }

    // #[Route('/{id}', name: 'app_candidat_delete', methods: ['POST'])]
    // public function delete(Request $request, Candidat $candidat, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->request->get('_token'))) {
    //         $entityManager->remove($candidat);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_candidat_profile', [], Response::HTTP_SEE_OTHER);
    // }
}