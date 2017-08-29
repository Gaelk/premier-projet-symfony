<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class calculatorController extends Controller
{
    /**
     * @Route("/add/{n1}/{n2}",
     *     name="calculator_add_and_misc",
     *     defaults={"n1":1, "n2":2},
     *     requirements={"n1":"\d+","n2":"\d+"}
     *     )
     *
     *
     */
    public function addAction($n1, $n2)

    {
        $clients=[
            ["nom"=>"Pierre", "prenom"=>"blaise", "id"=>"3", "email"=>"pierro.p@gmail.com"],
            ["nom"=>"dede", "prenom"=>"patrick", "id"=>"1", "email"=>"manzabi_tresor@gii.net"],
            ["nom"=>"blaiss", "prenom"=>"farrid", "id"=>"1", "email"=>"fafa@gtk.fr"]
        ];
        $result=$n1 + $n2;
        return $this->render(':calculator:add.html.twig', array("n1"=>$n1, "n2"=>$n2,"result"=>$result, 'cltr'=>$this,
                                "yesterday"=> new \DateTime("today -1 day"), "list"=> [4,5,6,1,2,3,7,8,9],"clients"=>$clients

        ));
    }

}
