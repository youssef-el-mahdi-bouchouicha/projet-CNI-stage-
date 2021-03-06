<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\Client;
use App\Form\ApplicationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/application")
 */
class ApplicationController extends AbstractController
{
    /**
     * @Route("/", name="application_index", methods={"GET"})
     */
    public function index(): Response
    {
        $applications = $this->getDoctrine()
            ->getRepository(Application::class)
            ->findAll();

        return $this->render('application/index.html.twig', [
            'applications' => $applications,
        ]);
    }

    /**
     * @Route("/new", name="application_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $application = new Application();
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($application);
            $entityManager->flush();

            return $this->redirectToRoute('application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('application/new.html.twig', [
            'application' => $application,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idapp}", name="application_show", methods={"GET"})
     */
    public function show(Application $application): Response
    {
        return $this->render('application/show.html.twig', [
            'application' => $application,
        ]);
    }

    /**
     * @Route("/{idapp}/edit", name="application_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Application $application): Response
    {
        $form = $this->createForm(ApplicationType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('application_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('application/edit.html.twig', [
            'application' => $application,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idapp}", name="application_delete", methods={"POST"})
     */
    public function delete(Request $request, Application $application): Response
    {
        if ($this->isCsrfTokenValid('delete'.$application->getIdapp(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($application);
            $entityManager->flush();
        }

        return $this->redirectToRoute('application_index', [], Response::HTTP_SEE_OTHER);
    }





    /**
     * @Route("/listeApp/{idc}", name="applicationliste_client", methods={"GET"})
     */
    public function indexApplication(int $idc): Response
    {

        $client= $this->getDoctrine()->getRepository(Client::class)->find($idc);
        $applications = $this->getDoctrine()
            ->getRepository(Application::class)
            ->findAll();


        return $this->render('application/indexClient.html.twig', [
            'applications' => $applications, 'client'=>$client,
        ]);
    }
}
