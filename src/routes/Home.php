<?php
namespace Src\Routes;

use Src\Classes\Core\RoutesManager;

class Home extends RoutesManager {

    public function initRoutes() {
        $this->Route = $this->getRouter()->add('/', 'Home Page');

        $this->Route->get('', FILTER_SANITIZE_NUMBER_INT, function($Rte, $Res, $param) {
            $Res->body($Rte->getPage())->params('inserted', $param);
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
