<?php

class NewUser extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //? llamamos al metodo render de la clase View y le pasamos la vista que debe renderizar
    public function render()
    {
        $this->view->render("newUser/index");
    }

    //?se recogen los datos del form de newUser/index.php
    public function registerUser()
    {
        $data = [
            'email' => $_POST['email'],
            'user_name' => $_POST['name'],
            'user_password' => $_POST['password'],
        ];
        //? se mandan al modelo (newUserModel)
        if ($this->model->insert($data)) {
            echo "Exito en la insercion de datos";
        };
        //?refrescamos la vista
        $this->render();
    }
}
