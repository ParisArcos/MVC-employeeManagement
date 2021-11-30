<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function render()
    {
        $users =  $this->model->get();
        $this->view->users = $users;
        $this->view->render("dashboard/index");
    }

    //?este método muestra a un usuario que le pasamos por GET
    //?en app.php recogemos el get y llamamos al meotdo que corresponde con el pase de parametros
    public function showUser($param = null)
    {
        $userName = $param;
        //?llamamos al modelo para que haga la consultar
        $user = $this->model->getById("$userName");
        //? le pasamos a la vista la informacion
        $this->view->user = $user;
        //? le decimos a la vista que pagina debe mostrar
        $this->view->render('dashboard/editUser');
    }

    //?este metodo recoge los datos de la vista y se los pase al modelo "update($data)" para actualizar
    public function updateUser()
    {
        //?recogemos los datos
        $data = [
            'email' => $_POST['email'],
            'user_password' => $_POST['password'],
            'user_name' => $_POST['user_name'],
        ];

        //?intentamos hacer el update a la BDD
        if ($this->model->update($data)) {
            //? si sale bien, creamos un nuevo usuario actualizado para mostrar en el form 
            $user = new User();
            $user->user_name = $data["user_name"];
            $user->user_password = $data['user_password'];
            $user->email = $data['email'];
            $this->view->user = $user;
            echo "<br>";
            echo "Exito en la actualisacion";
            echo "<br>";
        } else {
            //? si no, mostramos un error 
            echo "<br>";
            echo "Error en la actualisacion";
            echo "<br>";
        }
        //? refrescamos la vista
        $this->view->render('dashboard/editUser');
    }

    //? a esta funcion se le pasan los parametros por AJAX desde dashboard.js
    public function deleteUser($param = null)
    {
        $userName = $param;
        echo $userName;
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
}
