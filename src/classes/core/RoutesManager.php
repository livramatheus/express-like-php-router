<?php
namespace Src\Classes\Core;

use Src\Classes\Core\Router;

abstract class RoutesManager {
    
    /** @var RouteItem */
    protected $Route;
    
    /** @var Router */
    protected $Router;
    
    /**
     * 
     * @return Router
     */
    protected function getRouter() {
        if (!isset($this->Router)) {
            $this->Router = new Router();
        }
        
        return $this->Router;
    }
    
    abstract function initRoutes();
    
}
