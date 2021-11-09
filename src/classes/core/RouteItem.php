<?php
namespace Src\Classes\Core;

use Src\Classes\Core\RouteGet;
use Src\Classes\Core\RoutePost;

class RouteItem {

    /** @var RouteGet[] */
    private $routeGet = [];

    /** @var RoutePost[] */
    private $routePost = [];
    
    private $dir;
    private $page;

    public function __construct($dir, $page) {
        $this->dir = $dir;
        $this->page = $page;
    }

    public function getDir() {
        return $this->dir;
    }

    public function getPage() {
        return $this->page;
    }

    public function setDir($dir) {
        $this->dir = $dir;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    /**
     * Adds a POST route to the routes list
     * @param RoutePost $RoutePost The route to be added
     */
    private function addPostRoute(RoutePost $RoutePost) {
        $this->routePost[] = $RoutePost;
    }
    
    /**
     * Adds a GET route to the routes list
     * @param RoutePost $RouteGet The route to be added
     */
    private function addGetRoute(RouteGet $RouteGet) {
        $this->routeGet[] = $RouteGet;
    }
    
    /**
     * Creates a new GET route and adds it to the route list
     * @param string $key The GET parameter key
     * @param int $type The GET parameter type to be validated
     * @param callback $fn The function to be executed when the route matched
     * @param RouteItem $RouteItem
     * @param Response $Response
     * @return \RouteGet
     */
    public function get($key, $type, $fn, RouteItem $RouteItem, Response $Response = null) {
        $RouteGet = new RouteGet($key, $type, $fn, $RouteItem, $Response);
        $this->addGetRoute($RouteGet);
        $RouteGet->exec();

        return $RouteGet;
    }
    
    /**
     * Creates a new POST route and adds it to the route list
     * @param string $key The POST parameter key
     * @param int $type The POST parameter type to be validated
     * @param callback $fn The function to be executed when the route matched
     * @param RouteItem $RouteItem
     * @param Response $Response
     * @return \RouteGet
     */
    public function post($key, $type, $fn, RouteItem $RouteItem, Response $Response = null) {
        $RoutePost = new RoutePost($key, $type, $fn, $RouteItem, $Response);
        $this->addPostRoute($RoutePost);
        $RoutePost->exec();

        return $RoutePost;
    }
    
    /**
     * Returns the value of a GET parameter
     * @param string $key
     * @return mixed
     */
    public function getValueGet($key) {
        foreach ($this->routeGet as $RouteGet) {
            if ($key === $RouteGet->getKey()) {
                return $RouteGet->getValue();
            }
        }
    }
    
    /**
     * Returns the value of a GET parameter
     * @param string $key
     * @return mixed
     */
    public function getValuePost($key) {
        foreach ($this->routePost as $RoutePost) {
            if ($key === $RoutePost->getKey()) {
                return $RoutePost->getValue();
            }
        }
    }

}
