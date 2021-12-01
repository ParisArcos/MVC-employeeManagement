<?php

class User extends Controller
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

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //? se mandan al modelo (userModel)
        if ($this->model->login($email, $password)) {
            header("Location:" . BASE_URL . "dashboard/");
        } else {
            header("Location:" . BASE_URL);
            exit();
        }
    }
}
