<?php

class Employee extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    //? llamamos al metodo render de la clase View y le pasamos la vista que debe renderizar
    public function render()
    {
        $this->view->render("employee/index");
    }

    //?se recogen los datos del form de employee/index.php
    public function addEmployee()
    {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'postalCode' => $_POST['postalCode'],
            'lastName' => $_POST['lastName'],
            'gender' => $_POST['gender'],
            'streetAddress' => $_POST['streetAddress'],
            'age' => $_POST['age'],
            'phoneNumber' => $_POST['phoneNumber'],
        ];
        //? se mandan al modelo (employeeModel)
        if ($this->model->insert($data)) {
            header("Location:" . BASE_URL . "dashboard");
        };
        //?refrescamos la vista
        $this->render();
    }

    //?este metodo recoge los datos de la vista y se los pase al modelo "update($data)" para actualizar
    public function updateEmployee()
    {
        //?recogemos los datos
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'postalCode' => $_POST['postalCode'],
            'lastName' => $_POST['lastName'],
            'gender' => $_POST['gender'],
            'streetAddress' => $_POST['streetAddress'],
            'age' => $_POST['age'],
            'phoneNumber' => $_POST['phoneNumber'],
        ];

        //?intentamos hacer el update a la BDD
        if ($this->model->update($data)) {
            //? si sale bien, creamos un nuevo usuario actualizado para mostrar en el form 
            header("Location:" . BASE_URL . "dashboard");
        } else {
            //? si no, mostramos un error 
            echo "<br>";
            echo "Error en la actualisacion";
            echo "<br>";
        }
        //? refrescamos la vista
        $this->view->render('dashboard/editUser');
    }
}
