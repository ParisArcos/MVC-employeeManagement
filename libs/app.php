<?php
require_once "config/Router.php";


class App
{
    public function __construct()
    {
        $router  = new Router();
        $urlController = $router->getController();
        $urlMethod =  $router->getMethod();
        $urlParams = $router->getParam();

        //? El elemento 0 del array siempre va a pertenecer al controllador
        $fileController = 'controllers/' . $urlController . '.php';

        if (file_exists($fileController)) {
            //? Llamamos al archivo del controlador correspondiente
            require_once $fileController;
            //? Iniciamos el controlador
            $controller = new $urlController;
            //? cargamos el modelo del controlador
            $controller->loadModel($urlController);
            //? si la url contiene método
            if ($urlMethod) {
                //? llamamos a un método de la clase del controlador
                $controller->{$urlMethod}($urlParams);
            } else {
                $controller->render();
            }
        } else {
            require_once "controllers/errors.php";
            $controller = new Errors();
        }
    }
}
