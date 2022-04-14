<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonnelTerrainController extends AbstractController
{
    /**
     * @Route("/personnel/terrain", name="app_personnel_terrain")
     */
    public function index(): Response
    {
        return $this->render('personnel_terrain/index.html.twig', [
            'controller_name' => 'PersonnelTerrainController',
        ]);
    }
}
