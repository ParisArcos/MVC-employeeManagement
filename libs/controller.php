<?php
//? clase molde para todos los controladores
//! abstract
class Controller
{
    public function __construct()
    {
        //? se crea una instancia de la clase vista para poder llamar al render
        $this->view = new View();
    }

    //? se carga el modelo correspondientes
    public function loadModel($model)
    {
        $modelName = $model . 'Model';
        $url = 'models/' . $modelName . '.php';

        if (file_exists($url)) {

            //? se llama al modelo
            require $url;

            //? se llama instancia el modelo correspondiente
            $this->model = new $modelName();
        }
    }
}
