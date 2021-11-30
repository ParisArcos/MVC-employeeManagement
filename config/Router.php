<?php

class Router
{
    public $uri;
    public $controller;
    public $method;
    public $param;

    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }



    /**
     * Get the value of uri
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set the value of uri
     *
     * @return  self
     */
    public function setUri()
    {
        $this->uri = explode('/', substr($_SERVER['QUERY_STRING'], 4));

        return $this;
    }

    /**
     * Get the value of controller
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set the value of controller
     *
     * @return  self
     */
    public function setController()
    {
        $this->controller = $this->uri[0] === '' ? 'Main' : $this->uri[0];

        return $this;
    }

    /**
     * Get the value of method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */
    public function setMethod()
    {
        $this->method = !empty($this->uri[1]) ? $this->uri[1] : "";

        return $this;
    }

    /**
     * Get the value of param
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Set the value of param
     *
     * @return  self
     */
    public function setParam()
    {
        if (count($this->uri) > 3) {
            $params = [];
            for ($i = 2; $i < count($this->uri); $i++) {
                array_push($params, $this->uri[$i]);
            }
            $this->param = $params;
        } else {
            $this->param = !empty($this->uri[2]) ? $this->uri[2] : "";
        }


        return $this;
    }
}
