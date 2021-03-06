<?php

namespace App\Controller;

use App\Entity\Categoria;
use App\Entity\Filme;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $movies = $doctrine->getRepository(Filme::class)->findAll();
        $categorias = $doctrine->getRepository(Categoria::class)->findAll();

        // return $this->file('Keemple Smart Home _ 3D animation.mp4', 'my_invoice.pdf', ResponseHeaderBag::DISPOSITION_INLINE);

        

        return $this->render('home/index.html.twig',
        [
            'controller_name' => 'HomeController',
            'filmes' => $movies,
            'categorias' => $categorias
        ]);
    }

    public function getAllMovies()
    {
        
    }
}
