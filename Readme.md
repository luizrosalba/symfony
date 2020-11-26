# Symfony 

- usando composer : 

- composer create-project symfony/website-skeleton nome_projeto (versão com servidor WEb , mais completa )

- composer create-project symfony/skeleton nome_projeto (microservico , console ou api )

- composer create-project symfony/skeleton symfony

- symfony/flex ajudar a instalar e configurar 

- binario (console)
- config (rotas e servicos)  config > packages (componentes do symfony )
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

- composer require annotations

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

- implementando as rotas da web e api 

- bin/console debug:router mostra todas as rotas 

# Desenvolvendo Route Model 

- padrao MVC separa as responsabilidades
- model : conexão de DB e persistência 
- View : visual do sistema interface gráfica 
- controler : gerencia e roteira , qual template será carregado , etc 


# Twig - um gerenciador de template 

- podemos usar em qquer projeto 
- foco do twig é reaproveitamento de código neste caso as views 
- o mesmo template pode ser reutilizado em diversas paginas assim como componentes de paginação , breadcrumb, carossel ... 
- template será herdado pelas paginas filho 

- vamos usar o symfony flex 
- composer require twig 
- ttemplates ficam na pasta templates e é adicionado o arquivo twig em config 
- é semelhante ao yield do laravel , são espaços reservados para o conteúdo 
- composer require symfony/asset (referencia os arquivos na pasta pública)
- cada rota deve ter seu nome para ser fácil de  referenciar 


# Doctrine - ORM do Symfony 

- proprio para models do symfony 
- composer require orm 
- vamos usar o sqlite 
- configurado via annotation 
- pasta entity representam o objeto da tabela (ex: entidade usuario)
- migrations sequencia de modificações com base em versões (somente estrutura e não dados)
- repository coleção dos dados para fazermos consultas 

- bin/console doctrine:database:create

- chown www-data:www-data var/symfony.sqlite3 
- chmod 755 var/symfony.sqlite3 

- composer require maker  
- vamos criar as tabelas bin/console make:entity
- Usuario
- nome
- enter
- 150
- no
- Essa tabela ainda nao existe no DB 
- precisamos fazer um migration 
- bin/console make:migration (cria as classes )
- para cada versão podemos ter funcionalidades diferentes 
- bin/console doctrine:migrations:migrate
# Manipulando o DB 

- composer require --dev symfony/var-dumper


- podemos executar comandos sql do terminal 
- bin/console doctrine:query:sql "SELECT * FROM usuario"


# configurando a api 

- 

