<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GotohostController extends AbstractController
{
    /**
     * @Route("/gotohost", name="gotohost")
     */
    public function index(): Response
    {
        return $this->render('gotohost/index.html.twig', [
            'controller_name' => 'GotohostController',
        ]);
    }
}
