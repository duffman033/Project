<?php

namespace App\Controller;

use App\Repository\BlogpostRepository;
use App\Repository\EnvironnementRepository;
use App\Repository\HostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(HostRepository $hostRepository, BlogpostRepository $blogpostRepository, EnvironnementRepository $environnementRepository): Response
    {   $blogpost = $blogpostRepository->findBy([],['created_at'=>'DESC'], 3, 0);
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'hosts' => $hostRepository->findAll(),
            'blogposts' => $blogpost,
            'environnements' => $environnementRepository->findAll(),
        ]);
    }


}
