<?php
/**
 * Created by PhpStorm.
 * User: formation
 * Date: 30/08/2017
 * Time: 15:06
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Author;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixture extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $author= [];
        $author[]=new Author();
        $author[0]->setName("de Bazac")->setFirstName("Paul")
            ->setBirthDate(new\DateTime("1966-12-10"));
        $this->addReference("author_hugo",$author[0]);


        $author[]=new Author();
        $author[1]->setName("zamba")->setFirstName("zamba")
            ->setBirthDate(new\DateTime("1300-04-02"));
        $this->addReference("author_zamba",$author[1]);

        $author[]=new Author();
        $author[2]->setName("zombi")->setFirstName("de rouz")
            ->setBirthDate(new\DateTime("1177-04-02"));
        $this->addReference("author_zombi",$author[2]);
        // TODO: Implement load() method.

        foreach ($author as $item){
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
        return 1;
        // TODO: Implement getOrder() method.
    }
}