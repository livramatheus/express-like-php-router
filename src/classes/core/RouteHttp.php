<?php
namespace Src\Classes\Core;

/**
 * Abstract class for creating and managing Routes
 */
abstract class RouteHttp {

    /** @var Response */
    private $Response;
    
    /** @var RouteItem */
    private $RouteItem;
    
    private $key;
    private $type;
    private $fn;
    protected $paramType;

    public function __construct($key, $type, $fn, RouteItem $RouteItem, Response $Response = null) {
        $this->key       = $key;
        $this->type      = $type;
        $this->fn        = $fn;
        $this->RouteItem = $RouteItem;
        $this->Response  = $Response;
    }
    
    /**
     * Executes the function attached to the route
     */
    public function exec() {
        $params   = [];
        $params[] = $this->RouteItem;
        $params[] = empty($this->Response) ? new Response() : $this->Response;
        $params['params'] = filter_input($this->paramType, $this->key, $this->type);
        
        if ($params['params']) {
            call_user_func_array($this->fn, $params);
        }
    }

    public function getKey() {
        return $this->key;
    }

    public function getValue() {
        $input = filter_input($this->paramType, $this->key, $this->type);

        if ($input) {
            return $input;
        }
    }

}
