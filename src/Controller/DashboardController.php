<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\EnvironnementRepository;
use App\Repository\HostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(HostRepository $hostRepository, BlogpostRepository $blogpostRepository, EnvironnementRepository $environnementRepository): Response
    {
        $host = $hostRepository->findAll();
        $counthost=count($host);

        $blog = $blogpostRepository->findAll();
        $countblog=count($blog);

        $env = $environnementRepository->findAll();
        $countenv=count($env);
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'hosts' => $counthost,
            'blogposts' => $countblog,
            'environnements' => $countenv,
        ]);
    }
}
