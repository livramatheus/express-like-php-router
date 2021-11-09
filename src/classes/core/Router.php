<?php
namespace Src\Classes\Core;

use Src\Classes\Core\RouteItem;

/**
 * Router main class
 * @author Matheus do Livramento
 */
class Router {

    /** @var RouteItem[] */
    private $routeItem = [];

    /**
     * Adds a route
     * @param string $dir The route's path
     * @param string $page The HTML associated with the route
     * @return \RouteItem
     */
    public function add($dir, $page) {
        $RouteItem = new RouteItem($dir, $page);
        $this->routeItem[] = $RouteItem;

        return $RouteItem;
    }
    
    /**
     * Returns all routes
     * @return RouteItem[] The routes
     */
    public function all() {
        return $this->routeItem;
    }
    
    public function retrieve($path) {
        foreach ($this->routeItem as $RouteItem) {
            if ($path === $RouteItem->getDir()) {
                return $RouteItem;
            }
        }
    }
    
    public function getPage() {
        $pathInfo = filter_input(INPUT_SERVER, 'PATH_INFO');
        
        if (empty($pathInfo)) {
            return $this->retrieve('/')->getPage();
        }

        $route = '/' . explode('/', $pathInfo)[1];

        /* @var $matchedRoute RouteItem */
        $matchedRoute = $this->retrieve($route);

        if ($matchedRoute) {
            return $matchedRoute->getPage();
        }

        return '404';
    }

}
