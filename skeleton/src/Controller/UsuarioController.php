<?php 

namespace App\Controller;

use App\Entity\Usuario;
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
        return $this->render("usuario/form.html.twig");
    }
    /**
    * @Route("/salvar",methods={"POST"},name="salvar")
    */
    public function salvar(Request $request) : Response
    {
        $data = $request->request->all();
        $usuario = new Usuario; 
        
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        dump($usuario);

        $doctrine= $this->getDoctrine()->getManager();
        $doctrine->persist($usuario); 
        $doctrine->flush(); /// escreve no banco 

        dump($usuario);
        //if ($doctrine->container($usuario)){
        if ($usuario->getId()){
            return $this->render("usuario/sucesso.html.twig",[
                "fulano" => $data['nome']
            ]);
        }else
        {
            return $this->render("usuario/erro.html.twig",[
                "fulano" => $data['nome']
            ]);

        }
    }

}