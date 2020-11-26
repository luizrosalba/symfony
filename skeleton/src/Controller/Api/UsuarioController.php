<?php 

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;

// agrupando ( poderia ser feito por pastas)
/**
 *  @Route("/api/v1",name="api_v1_usuario")
 */
class UsuarioController{
    /**
     * @Route("/lista",methods={"GET"},name="lista") 
     */
    public function lista(): JsonResponse
    {
        return new JsonResponse(["implementar lista api"]);
    }
    /**
     * @Route("/cadastra",methods={"POST"},name="cadastra") 
     */
    public function cadastra(): JsonResponse
    {
        return new JsonResponse(["implementar cadastro api"]);
    }
}