<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Repository\JobCategoryRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobsController extends AbstractController
{
    #[Route('/jobs', name: 'app_jobs')]
    public function jobs(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {

        $jobOffers = $jobOfferRepository->findAll();
        $jobCategories = $jobCategoryRepository->findAll();
        return $this->render('jobs/jobs.html.twig', [
            'controller_name' => 'JobsController',
            'jobOffers' => $jobOffers,
            'jobCategories' => $jobCategories
        ]);
    }


    #[Route('/jobs/{id}', name: 'job_show', methods: ['GET'])]
    public function show(JobOfferRepository $jobOfferRepository, int $id): Response
    {
        $currentJobOffer = $jobOfferRepository->findOneBy(["id" => $id]);


        //boutton next debut
        // Verif si le Jo est le dernier 
        $maxJobOfferId = $jobOfferRepository->createQueryBuilder('jo')
            ->select('MAX(jo.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($id == $maxJobOfferId) {
            //  check si on est au dernier et si oui reste sur la meme page 
            $nextJobOffer = $currentJobOffer;
        } else {
            // sinon recup le prochain
            $nextJobOffer = $jobOfferRepository->createQueryBuilder('jo')
                ->where('jo.id > :id')
                ->setParameter('id', $id)
                ->orderBy('jo.id', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }
        //boutton next fin

        $maxJobOfferId = $jobOfferRepository->createQueryBuilder('jo')
            ->select('MIN(jo.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($id == $maxJobOfferId) {
            //  check si on est au dernier et si oui reste sur la meme page 
            $previousJobOffer = $currentJobOffer;
        } else {
            // sinon recup le prochain
            $previousJobOffer = $jobOfferRepository->createQueryBuilder('jo')
                ->where('jo.id < :id')
                ->setParameter('id', $id)
                ->orderBy('jo.id', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        }

        return $this->render('jobs/showJob.html.twig', [
            'JobOffer' => $currentJobOffer,
            'nextJobOffer' => $nextJobOffer,
            'previousJobOffer' => $previousJobOffer,
        ]);
    }

    public function minMax(string $minMax){
        
    }
}
