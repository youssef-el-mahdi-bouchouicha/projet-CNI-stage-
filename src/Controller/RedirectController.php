<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Demande;
use App\Entity\Reclamation;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RedirectController extends AbstractController
{

    /**
     * @Route("/backoffice", name="back")
     */
    public function backOffice(): Response
    {
        return $this->render('DashbordBack.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/frontoffice", name="front")
     */
    public function frontoffice(): Response
    {
        return $this->render('Front_Body.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('login.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/signup", name="signup")
     */
    public function signup(): Response
    {
        return $this->render('signup.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }


    /**
     * @Route("/verifLogin", name="verif_Login")
     */
    public function verifLogin(): Response
    {
        $login = $_GET['login'];
        $mdp = $_GET['mdp'];
        $client = $this->getDoctrine()->getRepository(Client::class)->findOneBy(array('nom' => $login ,'tel' => $mdp));

        if ($login == "admin" && $mdp == "admin") {
            return $this->render('DashbordBack.html.twig');
        } else if($login == null && $mdp == null)
        {
            return $this->render('signup.html.twig');
        }
        else{
            return $this->render('DashbordClient.html.twig',[
                "client"=>$client,
            ]);

        }
    }

}
