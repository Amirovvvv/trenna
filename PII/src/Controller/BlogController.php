<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="app_blog")
     */
    public function index(): Response
    {
        $blogs = $this->getDoctrine()->getManager()->getRepository(Blog::class)->findAll();
        return $this->render('blog/index.html.twig', [
            'b'=>$blogs
        ]);
    }

    /**
     * @Route("/", name="display_admin")
     */
    public function indexAdmin(): Response
    {

        return $this->render('Admin/admin.html.twig');

    }

    /**
     * @Route("/contact")
     */
    public function indexContact():Response
    {
        return $this->render('Contact/contact.html.twig');
    }

}
