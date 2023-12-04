<?php

namespace App\Controller;

use App\Entity\Contact;

use App\Form\ContactForm;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    #[Route('/contact', name: 'addcontact')]
    public function addcontact(Request $request, EntityManagerInterface $em)
    {
        $Contact = new Contact();
        $form = $this->createForm(ContactForm::class, $Contact);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($Contact);
            $em->flush();
            return $this->redirectToRoute("addcontact");
        }
        return $this->render("contact/index.html.twig", ["FormC" =>$form->createView()]);
    }

    #[Route('/listecontact', name: 'listecontact')]
    public function listecontact(ContactRepository $vr): Response
    {
        $contact = $vr->findAll();
        return $this->render('contact/Listecontact.html.twig', [
            'listecontact' => $contact,
        ]);
    }

    #[Route('/contact/{id}', name: 'contactdelete')]
    public function delete(EntityManagerInterface $em, ContactRepository $vr, $id): Response
    {
        $contact = $vr->find($id);
        $em->remove($contact);
        $em->flush();

        return $this->redirectToRoute('app_projet');
    }
}
