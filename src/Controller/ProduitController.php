<?php

namespace App\Controller;

use App\Entity\Produit;

use App\Form\ProduitForm;
use App\Repository\ProduitRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit', name: 'app_produit')]
    public function listeproduit(ProduitRepository $vr): Response
    {
        $produit = $vr->findAll();
        return $this->render('produit/listeproduit.html.twig', [
            'listeproduit' => $produit,
        ]);
    }
    #[Route('/addproduit', name: 'addproduit')]
    public function addproduit(Request $request, EntityManagerInterface $em)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitForm::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute("app_produit");
        }

        return $this->render("produit/index.html.twig", ["FormP" => $form->createView()]);
    }


    #[Route('/produit/{id}', name: 'produitdelete')]
    public function delete(EntityManagerInterface $em, ProduitRepository $vr, $id): Response
    {
        $produit = $vr->find($id);
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('app_produit');
    }
    #[Route('/produitupdate/{id}', name: 'produitupdate')]
    public function produitupdate(Request $request, EntityManagerInterface $em, ProduitRepository $vr, $id): Response
    {
        $produit=$vr->find($id);
        $editform=$this->createForm(ProduitForm::class , $produit);
        $editform->handleRequest($request);
        if ($editform->isSubmitted()and $editform->isValid())
        {
            $em->persist($produit);
            $em->flush();
            return $this->redirectToRoute("app_produit");
        }
        return $this->render('produit/produitupdate.html.twig',['editFormproduit'=>$editform->createView()]);
    }

}