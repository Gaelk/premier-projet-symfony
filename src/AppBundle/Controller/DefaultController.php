<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

//appel de la fonction helloAction() si dans URL on a: localhost/hello
    /**
     * @Route("/hello")
     * @return Response
     */ /*
    public function helloAction(){
        return new Response("hello tata");
    } */

    //appel de la fonction helloAction() si dans URL on a: localhost/hello/text
    /**
     * @Route("/hello/{name}")
     * @return Response
     *//*
    public function helloAction($name){
        return new Response("hello $name");
    } */

    //appel de la fonction helloAction() si dans URL on a: localhost/hello/text ou juste localhost/hello dans ce cas name va prendre la valeur par defaut
    //
    /**
     * @Route("/hello/{name}",
     *     defaults={"name": "world"}
     *     )
     * @return Response
     *//*
    public function helloAction($name){
        return new Response("hello $name");
    }*/

    /**
     * @Route("/hello/{name}/{age}",
     *     name="hello",
     *     defaults={"name": "world"},
     *     requirements={"age":"\d{1,3}","name":"\D+"}
     *     )
     * @return Response
     */
    public function helloAction(Request $request, $name, $age){
        //creation d'un message flash
  $this->addFlash("info","hello");

        $key=$request->get("key");
        //$key=$_GET["key"];
        if($key=="123"){
            /**$response= new Response("<h1>hello $name vous avez $age</h1>");
            *creation d'un fichier sans instance
            *  acceder à une page  .twig grace  en avec les para  */

            $response=$this->render("default/hello.html.twig",["name"=>$name, "age"=>$age]);


        }else{
            $response=new Response("Acces interdit");
            $response->setStatusCode(403);  //message d'erreur
        }
        return $response;
    }

    /**
     * @Route("api/user" )
     * @return JsonResponse
     */
    public function ajaxUserAction(){
       $user=["userName"=>"seb",
           "email"=>"contact@smaloronL.eu",
           "roles"=>["USER", "ADMIN","GOD"],
           "id"=>123
       ];
       $response= new JsonResponse($user);
       $response->headers->set("Access-control-Allow-Origin","*");
       return $response;
    }

}
