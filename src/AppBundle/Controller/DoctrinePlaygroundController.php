<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Entity\book;
use AppBundle\Entity\Publisher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DoctrinePlaygroundController extends Controller
{
    /**
     * @Route("/new-book")
     */
    public function newBookAction()
    {
        //methode qui crée dans la bd un nouveau livre
       $this->addBook();

        /*  // methode qui recuperation d'un book
         $this->repository();*/


        return $this->render(':DoctrinePlayground:new_book.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/book-list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        //recuperation d book
        $repository=$this->getDoctrine()->getRepository("AppBundle:book");
        $booklist= $repository->findAll();

        return $this->render(':DoctrinePlayground:index.html.twig',array( "books"=>$booklist ));
    }

    /**
     * @Route("/book-details/{id}", name="book_details")
     * @param $id
     *
     */
    public function detailsAction($id){
        $repository=$this->getDoctrine()->getRepository("AppBundle:book");
        $book=$repository->find($id);
        return $this->render(':DoctrinePlayground:details.html.twig',array( "book"=>$book ));
    }

    /**
     *
     */
    public function addBook()
    {
//creation d'une entité book

        $author1=new Author();
        $author1->setName("Hugo")
            ->setFirstName("Victor")
            ->setBirthDate( new \DateTime("1802-10-14"));

        $author2=new Author();
        $author2->setName("Arlette")
            ->setFirstName("Bangu")
            ->setBirthDate( new \DateTime("1993-10-05"));

        $publisher= new Publisher();
        $publisher->setName("Grasset");


        $book = new book();
        $book->setTitle("SQL for smarties")
            ->setPrice("50")
            ->setPublishedAt(new \DateTime("2000-01-25"))
            ->setPublisher($publisher)
            ->addAuthor($author1);
        //recuperation d'une instance
        $em = $this->getDoctrine()->getManager();
        //persitance du book
        $em->persist($book);
        //validation des données
        $em->flush();
    }

    public function repository()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:book");

        $book = $repository->find(2); // find() 1 livre dont id=2  ou findAll()
        $book->setTitle("Advanced SQL");
        $em = $this->getDoctrine()->getManager();
        $em->persist($book);
        $em->flush();
    }

}
