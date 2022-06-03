<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movie', name: 'app_movie')]
    public function index(): Response
    {
        // findAll() = SELECT * FROM movies;

        // find() = SELECT * FROM movies WHERE id = 5;

        // findBy() - [], ['column'=>'ASC' or 'DESC'] = SELECT * FROM movies ORDER BY id DESC;

        // findOneBy() - ['id' => 7, 'title' => 'The Dark Knight'], ['id' => 'DESC']
        // SELECT * FROM movies WHERE id = 6 AND title = 'The Dark Knight' ORDER BY id DESC;

        // count() - ([]) -> return number of rows,
        // SELECT COUNT() FROM movies WHERE id = 1;

        // getClassName() - repository where class held.
        $repository = $this->em->getRepository(Movie::class);

        $movies = $repository->getClassName();

        dd($movies);

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }
}
