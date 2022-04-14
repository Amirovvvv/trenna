<?php

namespace App\Controller;

use App\Entity\ArbitreMatch;
use App\Form\ArbitreMatchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/arbitre/match")
 */
class ArbitreMatchController extends AbstractController
{
    /**
     * @Route("/", name="app_arbitre_match_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $arbitreMatches = $entityManager
            ->getRepository(ArbitreMatch::class)
            ->findAll();

        return $this->render('arbitre_match/index.html.twig', [
            'arbitre_matches' => $arbitreMatches,
        ]);
    }

    /**
     * @Route("/new", name="app_arbitre_match_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $arbitreMatch = new ArbitreMatch();
        $form = $this->createForm(ArbitreMatchType::class, $arbitreMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($arbitreMatch);
            $entityManager->flush();

            return $this->redirectToRoute('app_arbitre_match_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('arbitre_match/new.html.twig', [
            'arbitre_match' => $arbitreMatch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idarb}", name="app_arbitre_match_show", methods={"GET"})
     */
    public function show(ArbitreMatch $arbitreMatch): Response
    {
        return $this->render('arbitre_match/show.html.twig', [
            'arbitre_match' => $arbitreMatch,
        ]);
    }

    /**
     * @Route("/{idarb}/edit", name="app_arbitre_match_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ArbitreMatch $arbitreMatch, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArbitreMatchType::class, $arbitreMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_arbitre_match_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('arbitre_match/edit.html.twig', [
            'arbitre_match' => $arbitreMatch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idarb}", name="app_arbitre_match_delete", methods={"POST"})
     */
    public function delete(Request $request, ArbitreMatch $arbitreMatch, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$arbitreMatch->getIdarb(), $request->request->get('_token'))) {
            $entityManager->remove($arbitreMatch);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_arbitre_match_index', [], Response::HTTP_SEE_OTHER);
    }
}
