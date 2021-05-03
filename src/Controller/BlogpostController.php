<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Entity\Images;
use App\Form\BlogpostType;
use App\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blogpost")
 */
class BlogpostController extends AbstractController
{
    /**
     * @Route("/", name="blogpost_blog", methods={"GET"})
     */
    public function blog(BlogpostRepository $blogpostRepository): Response
    {
        $blogpost = $blogpostRepository->findBy([],[], 5, 0);
        $blogpost_important = $blogpostRepository->findBy(array('Status' => true),[], 1, 0);

        return $this->render('blogpost/blog.html.twig', [
            'blogposts' => $blogpost,
            'blogpost_important' => $blogpost_important,
        ]);
    }

    /**
     * @Route("/index", name="blogpost_index", methods={"GET"})
     */
    public function index(BlogpostRepository $blogpostRepository): Response
    {
        return $this->render('blogpost/index.html.twig', [
            'blogposts' => $blogpostRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="blogpost_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blogpost = new Blogpost();
        $form = $this->createForm(BlogpostType::class, $blogpost);
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
                $blogpost->addImage($img);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blogpost);
            $entityManager->flush();

            return $this->redirectToRoute('blogpost_index');
        }

        return $this->render('blogpost/new.html.twig', [
            'blogpost' => $blogpost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blogpost_show", methods={"GET"})
     */
    public function show(Blogpost $blogpost): Response
    {
        return $this->render('blogpost/show.html.twig', [
            'blogpost' => $blogpost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blogpost_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Blogpost $blogpost): Response
    {
        $form = $this->createForm(BlogpostType::class, $blogpost);
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
                $blogpost->addImage($img);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blogpost_index');
        }

        return $this->render('blogpost/edit.html.twig', [
            'blogpost' => $blogpost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blogpost_delete", methods={"POST"})
     */
    public function delete(Request $request, Blogpost $blogpost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogpost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blogpost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blogpost_index');
    }

    /**
     * @Route("/supprime/image/{id}", name="blogpost_delete_image", methods={"HEAD","GET","DELETE"})
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
