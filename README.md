<h1 align="center">Express-like PHP router</h1>

<ul>
<li><a href="#english-documentation">English documentation</a></li>
<li><a href="#documentação-em-português">Documentação em português</a></li>
</ul>

<hr>
<p><h1 id="english-documentation">English Documentation</h1></p>
<h2>📜 Table of content</h2>

<!--ts-->
<ul>
    <li><a href="#about-the-project">About the project</a></li>
    <li><a href="#features">Features</a></li>
    <li><a href="#back-end">Back-end</a></li>
    <ul>
        <li><a href="#technologies-back">Technologies</a></li>
    </ul>
    <li><a href="#inspirations">Inspirations</a></li>
    <li><a href="#author">Author</a></li>
</ul>
<!--te-->

<h2 id="about-the-project">💻 About the project</h2>

<p>This was an attempt to mimic Express router in PHP. The outcome went pretty well, resembling a lot the "Original" Express.</p>
<p>The final product offers a router that accepts GET and POST requests.</p>
<p>This project is actually kinda small, and wasn't tested a lot, so there is still a lot more room to improve.</p>
<p>I'm aware that there is classes for managing requests and responses, but I wanted to build everything from scratch.</p>

<h2 id="features">🔎 Features</h2>

<p>This package offers a simple and standardized way to declare routes, accepting GET and POST parameters.</p>

<h2 id="back-end">Back-end</h2>

<p>The router is based on two main classes: Router and Response. Router receives and manages routes, Response is used to sent data back to the client.</p>

<p>The following example declares a route for "/". Showing various ways of setting up a parameter.</p>

<br/>
<strong>Declaring Routes</strong>

<em>Home.php</em>

```php
namespace Src\Routes;

use Src\Classes\Core\RoutesManager;

class Home extends RoutesManager {

    public function initRoutes() {
        $this->Route = $this->getRouter()->add('/', 'Home Page');

        $this->Route->get('data', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
            $Res->body($Rte->getPage())->params('returningparam', $param);
            $Res->status(200)->send();
        }, $this->Route);

        $this->Route->get('info', FILTER_SANITIZE_STRING, function($Rte, $Res) {
            $Res->body($Rte->getPage())->params('result', 123);
            $Res->status(350)->send();
        }, $this->Route);

        $this->Route->post('delete', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
            $Res->status(300)->params('deleted', $param)->send();
        }, $this->Route);
    }

}
```
<p>It is not mandatory, but is a good practice to standardize routes by extending the RoutersManager class.</p>

<br/>
<strong>Executing routes</strong>

<em>index.php</em>

```php
require __DIR__ . "/vendor/autoload.php";

use Src\Routes\Home;

$HomeRoutes = new Home;
$HomeRoutes->initRoutes();

```
<br/>

<p>The "get" method adds a GET route with the key of "data", validating it to integer. If this route matches, the callback function is called, using three main parameters. $Rte being the route, $Res being a response object to send data back to the client and $param, that stores the parameter matched by name.</p>

```php
$this->Route->get('data', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
    $Res->body($Rte->getPage())->params('returningparam', $param);
    $Res->status(200)->send();
}, $this->Route);
```

<blockquote>Every method of Response class can be chained.</blockquote>

<br/>

<p>With that route properly set-up, by sending this request:</p>

``` http://localhost/store/route.php?data=3 ```

<br/>
<p>You will get this response:</p>

```json
{"body":"Home Page","status":200,"params":{"returningparam":"3"}}
```

<h3 id="technologies-back">🔨 Technologies</h3>

<ul>
    <li><a href="https://getcomposer.org/">Composer, for autoloading classes</a></li>
</ul>

<h3 id="inspirations">😁 Inspirations</h3>

<ul>
    <li><a href="https://www.npmjs.com/package/express">Express</a></li>
</ul>

<h3 id="author">👩‍🦲 Author</h3>

Full stack developed by <strong>Matheus do Livramento</strong>.

<p><a href="https://github.com/livramatheus">GitHub</a> | <a href="https://www.linkedin.com/in/livramatheus">LinkedIn</a> | <a href="https://www.livramento.dev/">Website</a></p>

<hr />

<h1 id="documentação-em-português">Documentação em português</h1>
<h2>📜 Tabela de conteúdo</h2>

<ul>
    <li><a href="#about-the-project-br">Sobre o projeto</a></li>
    <li><a href="#features-br">Funcionalidades</a></li>
    <li><a href="#back-end-br">Back-end</a></li>
    <ul>
        <li><a href="#technologies-back-br">Technologies</a></li>
    </ul>
    <li><a href="#inspirations-br">Inspirações</a></li>
    <li><a href="#autor-br">Autor</a></li>
</ul>

<h2 id="about-the-project-br">💻 Sobre o projeto</h2>

<p>Esta foi uma tentativa de imitar o roteador Express em PHP. O resultado foi muito bom, lembrando muito o Express "Original".</p>
<p>O produto final oferece um roteador que aceita solicitações GET e POST.</p>
<p>Este projeto é um pouco pequeno e não foi muito testado, então ainda há muito mais espaço para melhorá-lo.</p>
<p>Estou ciente de que existem classes para gerenciar solicitações e respostas, mas queria construir tudo do zero.</p>

<h2 id="features-br">🔎 Funcionalidades</h2>

<p>Este pacote oferece uma forma simples e padronizada de declarar rotas, aceitando os parâmetros GET e POST.</p>

<h2 id="back-end-br">Back-end</h2>

<p>O roteador é baseado em duas classes principais: Router e Response. O Router recebe e gerencia as rotas, a Response é usada para enviar dados de volta ao cliente.</p>

<p>O exemplo a seguir declara uma rota para "/". Mostrando várias maneiras de configurar parâmetros.</p>

<br/>
<strong>Declarando rotas</strong>

<em>Home.php</em>

```php
namespace Src\Routes;

use Src\Classes\Core\RoutesManager;

class Home extends RoutesManager {

    public function initRoutes() {
        $this->Route = $this->getRouter()->add('/', 'Home Page');

        $this->Route->get('data', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
            $Res->body($Rte->getPage())->params('returningparam', $param);
            $Res->status(200)->send();
        }, $this->Route);

        $this->Route->get('info', FILTER_SANITIZE_STRING, function($Rte, $Res) {
            $Res->body($Rte->getPage())->params('result', 123);
            $Res->status(350)->send();
        }, $this->Route);

        $this->Route->post('delete', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
            $Res->status(300)->params('deleted', $param)->send();
        }, $this->Route);
    }

}
```
<p>Não é obrigatório, mas é uma boa prática padronizar rotas estendendo a classe RoutersManager.</p>

<br/>
<strong>Executing routes</strong>

<em>index.php</em>

```php
require __DIR__ . "/vendor/autoload.php";

use Src\Routes\Home;

$HomeRoutes = new Home;
$HomeRoutes->initRoutes();

```
<br/>

<p>O método "get" adiciona uma rota GET com a chave "data", validando-a para um inteiro. Se essa rota corresponder, a função de callback será chamada, usando três parâmetros principais. $Rte sendo a rota, $Res sendo um objeto de resposta para enviar dados de volta ao cliente e $param, que armazena o parâmetro correspondido pelo nome do parâmetro.</p>

```php
$this->Route->get('data', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
    $Res->body($Rte->getPage())->params('returningparam', $param);
    $Res->status(200)->send();
}, $this->Route);
```

<blockquote>Todo método da classe Response pode ser chamado em cadeia.</blockquote>

<br/>

<p>Com esta rota definida corretamente, enviando a seguinte requisição:</p>

``` http://localhost/store/route.php?data=3 ```

<br/>
<p>Você terá a seguinte resposta:</p>

```json
{"body":"Home Page","status":200,"params":{"returningparam":"3"}}
```

<h3 id="technologies-back-br">🔨 Tecnologias</h3>

<ul>
    <li><a href="https://getcomposer.org/">Composer, for autoloading classes</a></li>
</ul>

<h3 id="inspirations-br">😁 Inspirações</h3>

<ul>
    <li><a href="https://www.npmjs.com/package/express">Express</a></li>
</ul>

<h3 id="autor-br">👩‍🦲 Autor</h3>

<p>Full stack  desenvolvido por <strong>Matheus do Livramento</strong>.</p>
<p><a href="https://github.com/livramatheus">GitHub</a> | <a href="https://www.linkedin.com/in/livramatheus">LinkedIn</a> | <a href="https://www.livramento.dev/">Website</a></p>
