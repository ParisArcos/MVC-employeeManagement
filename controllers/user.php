<?php

class User extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function render()
    {
        $users =  $this->model->get();
        $this->view->users = $users;
        $this->view->render("user/index");
    }

    public function registerUser()
    {
        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];
        //? se mandan al modelo (newUserModel)
        if ($this->model->insert($data)) {
            //echo "Exito en la insercion de datos";
        };
        //?refrescamos la vista
        $this->render();
    }

    public function newUser()
    {
        $this->view->render("user/addUser");
    }

    //?este método muestra a un usuario que le pasamos por GET
    //?en app.php recogemos el get y llamamos al meotdo que corresponde con el pase de parametros
    public function showUser($param = null)
    {
        $userName = $param;
        //?llamamos al modelo para que haga la consultar
        $user = $this->model->getById("$userName");
        //? le pasamos a la vista la informacion
        $users =  $this->model->get($userName);
        $this->view->users = $users;
        $this->view->user = $user;
        //? le decimos a la vista que pagina debe mostrar
        $this->view->render('user/editUser');
    }

    //?este metodo recoge los datos de la vista y se los pase al modelo "update($data)" para actualizar
    public function updateUser()
    {
        //?recogemos los datos
        $data = [
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'name' => $_POST['name'],
        ];

        //?intentamos hacer el update a la BDD
        if ($this->model->update($data)) {
            //? si sale bien, creamos un nuevo usuario actualizado para mostrar en el form 
            $user = new User();
            $user->name = $data["name"];
            $user->password = $data['password'];
            $user->email = $data['email'];
            $this->view->user = $user;
        } else {
            //? si no, mostramos un error 

        }
        //? refrescamos la vista
        $this->render();
    }

    //? a esta funcion se le pasan los parametros por AJAX desde user.js
    public function deleteUser($param = null)
    {
        $userName = $param;
        //?intentamos hacer el delete a la BDD
        if ($this->model->delete($userName)) {
            //? si sale bien, creamos un nuevo usuario actualizado para mostrar en el form 

            $text = "Exito en la eliminacion";
        } else {
            //? si no, mostramos un error 
            $text = "Error en la eliminacion";
        }

        echo $text;
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
