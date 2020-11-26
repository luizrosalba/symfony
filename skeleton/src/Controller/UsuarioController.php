<?php 

namespace App\Controller; 

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("/",name="web_usuario_")
 */
class UsuarioController 
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
        return new Response("implementar cadastro"); 
    }
    /**
    * @Route("/salvar",methods={"POST"},name="salvar")
    */
    public function salvar() : Response
    {
        return new Response("implemntar salvar ");
    }

}