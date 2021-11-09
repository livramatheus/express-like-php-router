<?php
namespace Src\Classes\Core;

use Src\Classes\Core\RouteHttp;

/**
 * Class for creating GET routes
 */
class RouteGet extends RouteHttp {

    public function __construct($key, $type, $fn, RouteItem $RouteItem, Response $Response = null) {
        parent::__construct($key, $type, $fn, $RouteItem, $Response);
        $this->paramType = INPUT_GET;
    }

}
