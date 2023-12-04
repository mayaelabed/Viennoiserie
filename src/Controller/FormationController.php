<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationsType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/formation')]
class FormationController extends AbstractController
{
    #[Route('/', name: 'app_formation')]
    public function index(): Response
    {
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
// ajouter formation

    #[Route('/new', name: 'addformation')]
    public function addformation(Request $request, EntityManagerInterface $em)
    {
        $Formation = new Formation();
        $form = $this->createForm(FormationsType::class, $Formation);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($Formation);
            $em->flush();
            return $this->redirectToRoute("addformation");
        }
        return $this->render("formation/new.html.twig", ["FormV" =>$form->createView()]);
    }

    #[Route('/{id}', name: 'app_formations_show', methods: ['GET'])]
    public function show(Formation $formations): Response
    {
        return $this->render('formations/show.html.twig', [
            'formations' => $formations,
        ]);
    }
    // modiffier formation
    public function edit(Request $request, Formation $formation): Response
    {
        $form = $this->createForm(FormationsType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formation_index');
        }

        return $this->render('formation/edit.html.twig', [
            'formations' => $formation,
            'form' => $form->createView(),
        ]);
    }
    // supprimer formation
    #[Route('/{id}', name: 'app_formations_delete', methods: ['POST'])]
    public function delete(Request $request, Formation $formation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($formation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_formations_index', [], Response::HTTP_SEE_OTHER);
    }
}
