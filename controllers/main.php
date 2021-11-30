<?php

class Main extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //? llamamos al metodo render de la clase View y le pasamos la vista que debe renderizar
    public function render()
    {
        $this->view->render("main/index");
    }
}
