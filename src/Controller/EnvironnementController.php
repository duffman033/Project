<?php

namespace App\Controller;

use App\Entity\Environnement;
use App\Entity\Images;
use App\Form\EnvironnementType;
use App\Repository\EnvironnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/environnement")
 */
class EnvironnementController extends AbstractController
{
    /**
     * @Route("/", name="environnement_home", methods={"GET"})
     */
    public function environnement(EnvironnementRepository $environnementRepository): Response
    {
        return $this->render('environnement/env.html.twig', [
            'environnements' => $environnementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/index", name="environnement_index", methods={"GET"})
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

        $images = $form->get('images')->getData();

        if ($form->isSubmitted() && $form->isValid()) {

            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new Images();
                $img->setName($fichier);
                $environnement->addImage($img);
            }

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
        $images = $form->get('images')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new Images();
                $img->setName($fichier);
                $environnement->addImage($img);
            }
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

    /**
     * @Route("/supprime/image/{id}", name="environnement_delete_image", methods={"HEAD","GET","DELETE"})
     */
    public function deleteImage(Images $image, Request $request){
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide

        // On récupère le nom de l'image
        $nom = $image->getName();
        // On supprime le fichier
        unlink($this->getParameter('images_directory').'/'.$nom);

        // On supprime l'entrée de la base
        $em = $this->getDoctrine()->getManager();
        $em->remove($image);
        $em->flush();

        // On répond en json
        return new JsonResponse(['success' => 1]);
    }
}
