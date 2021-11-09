<?php
namespace Src\Classes\Core;

/**
 * Class for preparing and sending responses back to the client
 * @author Matheus do Livramento
 */
class Response {
    
    private $body;
    private $status;
    private $params = [];
    
    /**
     * Sets the body of the response
     * @param string $body The content to be rendered on the client side
     * @return Response
     */
    public function body($body) {
        $this->body = $body;
        return $this;
    }

    /**
     * Sets the response status
     * @param int $status Response's status
     * @return Response
     */
    public function status($status) {
        $this->status = $status;
        return $this;
    }
    
    /**
     * Sets parameters to the response
     * @param string $key Response's key
     * @param string $value Response's value
     * @return Response
     */
    public function params($key, $value) {
        $this->params[$key] = $value;
        return $this;
    }
        
    /**
     * Sends the response back to the client
     */
    public function send() {
        die(json_encode(get_object_vars($this)));
    }
    
}
