<?php

namespace App\Controller;

use App\Entity\Environnement;
use App\Form\EnvironnementType;
use App\Repository\EnvironnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/environnement")
 */
class EnvironnementController extends AbstractController
{
    /**
     * @Route("/", name="environnement_index", methods={"GET"})
     */
    public function index(EnvironnementRepository $environnementRepository): Response
    {
        return $this->render('environnement/index.html.twig', [
            'environnements' => $environnementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="environnement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $environnement = new Environnement();
        $form = $this->createForm(EnvironnementType::class, $environnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($environnement);
            $entityManager->flush();

            return $this->redirectToRoute('environnement_index');
        }

        return $this->render('environnement/new.html.twig', [
            'environnement' => $environnement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="environnement_show", methods={"GET"})
     */
    public function show(Environnement $environnement): Response
    {
        return $this->render('environnement/show.html.twig', [
            'environnement' => $environnement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="environnement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Environnement $environnement): Response
    {
        $form = $this->createForm(EnvironnementType::class, $environnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('environnement_index');
        }

        return $this->render('environnement/edit.html.twig', [
            'environnement' => $environnement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="environnement_delete", methods={"POST"})
     */
    public function delete(Request $request, Environnement $environnement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$environnement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($environnement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('environnement_index');
    }
}
