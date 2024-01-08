<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_projet')]
    public function index()
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/projectA', name: 'app_projetA')]
    public function indexA()
    {
        return $this->render('Admin/indexAdmin.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
    #[Route('/projectU', name: 'app_projetU')]
    public function indexU(UserRepository $vr, Security $security):Response
    {
        $user = $security->getUser();

        return $this->render('user/index.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/login', name: 'app_login')]
    public function login()
    {
        return $this->render('security/login.html.twig', ['controller_name' => 'ProjectController',
        ]);
    }
//route pour la page des produit
/*
    #[Route('/product', name: 'app_product')]
    public function prod()
    {
        return $this->render('project/product.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }*/
//route pour la page panier
    /*#[Route('/cart', name: 'app_cart')]
    public function cart()
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }
// route pour la page checkout
    #[Route('/checkout', name: 'app_checkout')]
    public function checkout()
    {
        return $this->render('project/checkout.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }*/

    #[Route('/about', name: 'app_about')]
    public function about()
    {
        return $this->render('project/about.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact()
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    /*#[Route('/profile', name: 'app_profile')]
     public function profile()
     {
         return $this->render('project/profile.html.twig', [
             'controller_name' => 'ProjectController',
         ]);
     }
     #[Route('/editprofile', name: 'app_editpro')]
     public function editprofile()
     {
         return $this->render('project/editprofile.html.twig', [
             'controller_name' => 'ProjectController',
         ]);
     }*/
    #[Route('/formation', name: 'app_formation')]
    public function formation()
    {
        return $this->render('project/formation.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    #[Route('/register', name: 'app_register')]
    public function register()
    {
        return $this->render('project/register.html.twig', [
            'controller_name' => 'ProjectController',
        ]);
    }

    #[Route('/profile', name: 'listeuser')]
    public function listeuser(UserRepository $vr, Security $security): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $security->getUser();




        return $this->render('project/profile.html.twig', [
            'listeuser' => $user,
        ]);

    }
    #[Route('/editprofile', name: 'edit')]
    public function edit(UserRepository $vr, Security $security): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $security->getUser();




        return $this->render('project/editprofile.html.twig', [
            'edit' => $user,
        ]);

    }
}