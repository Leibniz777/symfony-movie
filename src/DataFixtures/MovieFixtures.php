<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $movie = new Movie();
    $movie->setTitle('The Dark Knight');
    $movie->setReleaseYear(2008);
    $movie->setDescription('This is the desc of Dark Knight');
    $movie->setImagePath('https://cdn.pixabay.com/photo/2019/11/15/21/25/tank-4629329_960_720.jpg');

    //Add Data to Pivot Table
    $movie->addActor($this->getReference('actor_1'));
    $movie->addActor($this->getReference('actor_2'));
    $manager->persist($movie);

    $movie2 = new Movie();
    $movie2->setTitle('Avengers');
    $movie2->setReleaseYear(2019);
    $movie2->setDescription('This is the desc of Avengers: Endgame');
    $movie2->setImagePath('https://cdn.pixabay.com/photo/2021/11/05/17/09/lego-6771732_640.jpg');

    //Add Data to Pivot Table
    $movie->addActor($this->getReference('actor_3'));
    $movie->addActor($this->getReference('actor_4'));
    $manager->persist($movie2);

    $manager->flush();
  }
}
