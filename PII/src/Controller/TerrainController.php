<?php

namespace App\Controller;

use App\Form\TerrainType;
use App\Entity\Terrain;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TerrainController extends AbstractController
{
    /**
     * @Route("/afficher", name="display_terrain")
     */
    public function index(): Response
    {
        $terrains=$this->getDoctrine()->getManager()->getRepository(Terrain::class)->findAll();
        return $this->render('terrain/index.html.twig', [
           'b'=>$terrains
        ]);
    }


    /**
     * @Route("/addTerrain", name="addTerrain")
     */
    public function addTerrain(Request $request): Response
    {
$terrain = new Terrain();
$form=$this->createForm(TerrainType::class,$terrain);
$form->HandleRequest($request);
if($form->isSubmitted() && $form->isValid()){
    $em= $this->getDoctrine()->getManager();
    $em->persist($terrain);
    $em->flush();
    return $this->redirectToRoute('display_terrain');
}
return $this->render('terrain/createdTerrain.html.twig',['t'=>$form->createView()]);

}
    /**
     * @Route("/supprimer/{id}", name="supp_terrain")
     */
    public function supprimer(Terrain $terrain): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em-> remove($terrain);
        $em->flush();
   return $this->redirectToRoute('display_terrain');
    }

    /**
     * @Route("/modifierTerrain/{id}", name="modifierTerrain")
     */
    public function modifierTerrain(Request $request,$id): Response
    {
        $terrain = $this->getDoctrine()->getManager()->getRepository(Terrain::class)->find($id);
        $form=$this->createForm(TerrainType::class,$terrain);
        $form->HandleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em= $this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute('display_terrain');
        }
        return $this->render('terrain/updateTerrain.html.twig',['t'=>$form->createView()]);

    }

}
