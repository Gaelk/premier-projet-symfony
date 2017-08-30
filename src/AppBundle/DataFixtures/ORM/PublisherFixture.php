<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 30/08/2017
 * Time: 15:54
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Publisher;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PublisherFixture extends AbstractFixture implements OrderedFixtureInterface {


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $PublisherFixture= [];
        $PublisherFixture[]=new Publisher();
        $PublisherFixture[0]->setName("Grasset");
        $this->addReference("publisher_Grasset", $PublisherFixture[0] );

        $PublisherFixture[]=new Publisher();
        $PublisherFixture[1]->setName("Hachette");
        $this->addReference("publisher_Hachette", $PublisherFixture[1] );

        $PublisherFixture[]=new Publisher();
        $PublisherFixture[2]->setName("PUF");
        $this->addReference("publisher_PUF", $PublisherFixture[2] );

        foreach ($PublisherFixture as $item){
            $manager->persist($item);
        }
        $manager->flush();


        // TODO: Implement load() method.
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
        // TODO: Implement getOrder() method.
    }
}