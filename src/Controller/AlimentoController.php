<?php

// src/Controller/AlimentoController.php

namespace App\Controller;

use App\Entity\Alimento;
use App\Form\AlimentoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentoController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/alimento', name: 'alimento_index', methods: ['GET'])]
    public function index(): Response
    {
        $alimenti = $this->entityManager->getRepository(Alimento::class)->findAll();

        return $this->render('alimento/index.html.twig', [
            'alimenti' => $alimenti,
        ]);
    }

    #[Route('/alimento/new', name: 'alimento_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $alimento = new Alimento();
        $form = $this->createForm(AlimentoType::class, $alimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($alimento);
            $this->entityManager->flush();

            return $this->redirectToRoute('alimento_index');
        }

        return $this->render('alimento/new.html.twig', [
            'alimento' => $alimento,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/alimento/{id}', name: 'alimento_show', methods: ['GET'])]
    public function show(Alimento $alimento): Response
    {
        return $this->render('alimento/show.html.twig', [
            'alimento' => $alimento,
        ]);
    }

    #[Route('/alimento/{id}/edit', name: 'alimento_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Alimento $alimento): Response
    {
        $form = $this->createForm(AlimentoType::class, $alimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();

            return $this->redirectToRoute('alimento_index');
        }

        return $this->render('alimento/edit.html.twig', [
            'alimento' => $alimento,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/alimento/{id}', name: 'alimento_delete', methods: ['DELETE'])]
    public function delete(Request $request, Alimento $alimento): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alimento->getId(), $request->request->get('_token'))) {
            $this->entityManager->remove($alimento);
            $this->entityManager->flush();
        }

        return $this->redirectToRoute('alimento_index');
    }
}
