<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 30/08/2017
 * Time: 16:20
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\book;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class BookFixture extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.

       // $books[]=new book();

        $books[]= $this->getNewBookInstance([
            "title"=>"liberté",
            "price"=>9,
            "published"=>new \DateTime("2000-11-14"),
            "authors"=>$this->getReference("author_zombi"),
            "publisher"=>$this->getReference("publisher_Grasset")
        ]);

        foreach ($books as $item){
            $manager->persist($item);
        }
        $manager->flush();


    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 30;
        // TODO: Implement getOrder() method.
    }


    private function getNewBookInstance(Array $data){
        $book= new book();
        $book->setTitle($data["title"])
            ->setPrice($data["price"])
            ->addAuthor($data["authors"])
            ->setPublishedAt($data["published"])
            ->setPublisher($data["publisher"]);

       /* foreach ($book as $item){
            $manager->persist($item);
        }
        $manager->flush();*/
       return $book;
    }



}