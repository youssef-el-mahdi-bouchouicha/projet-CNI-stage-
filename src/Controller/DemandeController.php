<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Demande;

use App\Form\DemandeType;
use App\Form\DemandeCType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demande")
 */
class DemandeController extends AbstractController
{
    /**
     * @Route("/", name="demande_index", methods={"GET"})
     */
    public function index(): Response
    {
        $demandes = $this->getDoctrine()
            ->getRepository(Demande::class)
            ->findAll();

        return $this->render('demande/index.html.twig', [
            'demandes' => $demandes,
        ]);
    }


    /**
     * @Route("/new", name="demande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $demande = new Demande();
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

            return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{idd}", name="demande_show", methods={"GET"})
     */
    public function show(Demande $demande): Response
    {
        return $this->render('demande/show.html.twig', [
            'demande' => $demande,
        ]);
    }

    /**
     * @Route("/{idd}/edit", name="demande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Demande $demande): Response
    {
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demande/edit.html.twig', [
            'demande' => $demande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idd}", name="demande_delete", methods={"POST"})
     */
    public function delete(Request $request, Demande $demande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$demande->getIdd(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($demande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('demande_index', [], Response::HTTP_SEE_OTHER);
    }



    /**
     * @Route("/listeD/{idc}", name="demandeliste_client", methods={"GET"})
     */
    public function listeDC(int $idc): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client= $entityManager->getRepository(Client::class)->find($idc);
        $mesdemandes= $entityManager->getRepository(Demande::class)->findBy(array('idc' => $idc));


        return $this->render('demande/indexClient.html.twig', [
            'mesdemandes' => $mesdemandes, 'client'=> $client,
        ]);
    }

    /**
     * @Route("/newC/{idc}", name="demande_Client", methods={"GET","POST"})
     */
    public function newDClient(Request $request, int $idc): Response
    {
        $client=$this->getDoctrine()->getRepository(Client::class)->find($idc);
        $demande = new Demande();
        $form = $this->createForm(DemandeCType::class, $demande);
        $form->handleRequest($request);
        $demande->setIdc($client);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($demande);
            $entityManager->flush();

            $entityManager = $this->getDoctrine()->getManager();


            $mesdemandes= $entityManager->getRepository(Demande::class)->findBy(array('idc' => $idc));


            return $this->render('demande/indexClient.html.twig', [
                'mesdemandes' => $mesdemandes, 'client'=> $client,
            ]);
        }

        return $this->render('demande/newDemandeClient.html.twig', [
            'demande' => $demande,'client' =>$client,
            'form' => $form->createView(),
        ]);
    }
}
