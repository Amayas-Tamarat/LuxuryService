<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\Candidature;
use App\Entity\JobOffer;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatureController extends AbstractController
{
    #[Route('/candidature/{id}', name: 'app_candidature')]
    public function index(JobOffer $jobOffer, EntityManagerInterface $entityManager): Response
    {
        /**
         * @var User $user
         */
        $user = $this->getUser();
        $candidat = $user->getCandidat();

        $candidature = new Candidature;
        $candidature->setCandidat($candidat);
        $candidature->setJobOffer($jobOffer);
        $entityManager->persist($candidature);
        $entityManager->flush();



        return $this->redirectToRoute('app_home');

    }
}
