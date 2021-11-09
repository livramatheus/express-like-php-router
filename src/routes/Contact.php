<?php
namespace Src\Routes;

use Src\Classes\Views\ViewContact;
use Src\Classes\Core\RoutesManager;
use Src\Classes\Core\Response;

class Contact extends RoutesManager {

    public function initRoutes() {
        $ViewContact = new ViewContact();
        $this->Route = $this->getRouter()->add('/contact', $ViewContact->render());
        
        $Response = new Response();
        $Response->body($this->Route->getPage())->send();
    }

}
