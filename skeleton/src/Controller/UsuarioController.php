<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("/",name="web_usuario_")
 */
class UsuarioController extends AbstractController
{
    /**
    * @Route("/",methods={"GET"},name="index")
    */
    public function index(): Response
    {
        //return new Response ("Digital",200);
        // $resp = new Response();
        // $resp->setContent(json_encode(
        //     [
        //         "recebido" => $request->get('nome'),
        //         "ip" =>$request->getClientIp()
        //     ]
        // )); 
        // $resp->setStatusCode(200);
        // return $this->render("usuario/form.html.twig");
        return $this->render("usuario/erro.html.twig",[
            'fulano' => "Adriano"
        ]);
    }
    /**
    * @Route("/salvar",methods={"POST"},name="salvar")
    */
    public function salvar() : Response
    {
        return new Response("implemntar salvar ");
    }

}