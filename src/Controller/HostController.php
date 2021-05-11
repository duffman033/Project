<?php

namespace App\Controller;

use App\Entity\Host;
use App\Entity\Images;
use App\Form\HostType;
use App\Repository\HostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/host")
 */
class HostController extends AbstractController
{
    /**
     * @Route("/", name="host_host", methods={"GET"})
     */
    public function blog(HostRepository $hostRepository): Response
    {
        return $this->render('host/host.html.twig', [
            'hosts' => $hostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/index", name="host_index", methods={"GET"})
     */
    public function index(HostRepository $hostRepository): Response
    {
        return $this->render('host/index.html.twig', [
            'hosts' => $hostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="host_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $host = new Host();
        $form = $this->createForm(HostType::class, $host);
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
                $host->addImage($img);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($host);
            $entityManager->flush();

            $this->addFlash('success',"Votre annonce à bien été publiée!");
            return $this->redirectToRoute('host_index');
        }

        return $this->render('host/new.html.twig', [
            'host' => $host,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_show", methods={"GET"})
     */
    public function show(Host $host): Response
    {
        return $this->render('host/show.html.twig', [
            'host' => $host,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="host_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Host $host): Response
    {
        $form = $this->createForm(HostType::class, $host);
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
                $host->addImage($img);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('host_index');
        }

        return $this->render('host/edit.html.twig', [
            'host' => $host,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_delete", methods={"POST"})
     */
    public function delete(Request $request, Host $host): Response
    {
        if ($this->isCsrfTokenValid('delete'.$host->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($host);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_index');
    }

    /**
     * @Route("/supprime/image/{id}", name="host_delete_image", methods={"HEAD","GET","DELETE"})
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
