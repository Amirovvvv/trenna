<?php

namespace App\Controller;

use App\Entity\Foot;
use App\Form\FootType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/foot")
 */
class FootController extends AbstractController
{
    /**
     * @Route("/", name="app_foot_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $feet = $entityManager
            ->getRepository(Foot::class)
            ->findAll();

        return $this->render('foot/index.html.twig', [
            'feet' => $feet,
        ]);
    }

    /**
     * @Route("/new", name="app_foot_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $foot = new Foot();
        $form = $this->createForm(FootType::class, $foot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($foot);
            $entityManager->flush();

            return $this->redirectToRoute('app_foot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('foot/new.html.twig', [
            'foot' => $foot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idmatchh}", name="app_foot_show", methods={"GET"})
     */
    public function show(Foot $foot): Response
    {
        return $this->render('foot/show.html.twig', [
            'foot' => $foot,
        ]);
    }

    /**
     * @Route("/{idmatchh}/edit", name="app_foot_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Foot $foot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FootType::class, $foot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_foot_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('foot/edit.html.twig', [
            'foot' => $foot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idmatchh}", name="app_foot_delete", methods={"POST"})
     */
    public function delete(Request $request, Foot $foot, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$foot->getIdmatchh(), $request->request->get('_token'))) {
            $entityManager->remove($foot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_foot_index', [], Response::HTTP_SEE_OTHER);
    }
}
