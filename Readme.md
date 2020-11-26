# Symfony 

- usando composer : 

- composer create-project symfony/website-skeleton nome_projeto (versão com servidor WEb , mais completa )

- composer create-project symfony/skeleton nome_projeto (microservico , console ou api )

- composer create-project symfony/skeleton symfony

- symfony/flex ajudar a instalar e configurar 

- binario (console)
- config (rotas e servicos) 
- public raiz do sistema 
- src = app do laravel 
- var = storage do laravel 
- vendor = dep do composer
- env = laravel 

- utilizario cli 
- bin/console
- não tem o comando service  somente no web:skeleton  se quiser instalar (composer require webserver)

- configurar o servidor apache apontando pra pasta publica 
- ERP - projeto grande e complexo com usuarios , etc 
- flex symfony -> receitas do sumfony eh igual ao packages do laravel 
- composer server:run (para rodar com o serviço travado no console)
-
# Rotas e API no symfony 

- yaml 
- annotations na propria funcao , acima dele já está a rota (em forma de comentário)
- php 
- xml 

- rota index 
- passando por query string 
- http://localhost:89/?nome=digital

```JS 
 public function index (Request $request): Response
    {
        //return new Response ("Digital",200);
        $resp = new Response();
        $resp->setContent(json_encode(
            [
                "recebido" => $request->get('nome')
            ]
        )); 
        $resp->setStatusCode(200);
        return $resp; 
    }
```

nossa rota atual : 

```JS 
index:
    path: /
    controller: App\Controller\DefaultController::index
```
- vamos converter a rota atual para executar com annotations 

- compose require annotations

```JS
<?php 

namespace App\Controller; 

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 

use Symfony\Component\Routing\Annotation\Route;

class DefaultController 
{
    /**
    * @Route("/",methods={"POST","GET"})
    */
    public function index (Request $request): Response
    {
        //return new Response ("Digital",200);
        $resp = new Response();
        $resp->setContent(json_encode(
            [
                "recebido" => $request->get('nome'),
                "ip" =>$request->getClientIp()
            ]
        )); 
        $resp->setStatusCode(200);
        return $resp; 
    }
}
```