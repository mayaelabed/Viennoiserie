<?php

namespace App\Controller;

use App\Entity\Checkout;
use App\Form\CheckoutForm;
use App\Repository\CheckoutRepository;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function index(): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }
    #[Route('/addcommande', name: 'addcommande')]
    public function addcommande(Request $request, EntityManagerInterface $em)
    {
        $checkout = new Checkout();
        $form = $this->createForm(CheckoutForm::class, $checkout);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($checkout);
            $em->flush();
            return $this->redirectToRoute("app_projet");
        }
        return $this->render("checkout/ajout.html.twig", ["FormC" => $form->createView()]);
    }
    #[Route('/liste', name: 'liste')]
    public function liste(CheckoutRepository $vr): Response
    {
        $confirm = $vr->findAll();
        return $this->render('checkout/confirmation.html.twig', [
            'liste' => $confirm,
        ]);
    }
}
