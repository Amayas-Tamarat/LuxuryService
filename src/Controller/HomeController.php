<?php

namespace App\Controller;

use App\Repository\JobCategoryRepository;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(JobOfferRepository $jobOfferRepository, JobCategoryRepository $jobCategoryRepository): Response
    {
        $jobOffers = $jobOfferRepository->findAll();
        $jobCategories = $jobCategoryRepository->findAll();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'jobOffers' => $jobOffers,
            'jobCategories'=>$jobCategories
        ]);
    }
}
