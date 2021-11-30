<?php

class Errors extends Controller
{
    public function __construct()
    {
        //? llamada al constructor padre
        parent::__construct();
        //? pasar a la vista un prop($message)
        $this->view->message = "NOT FOUND QUERIOOO!";
        //? llamamos al metodo render de la clase View y le pasamos la vista que debe renderizar
        $this->view->render("errors/index");
    }
}
