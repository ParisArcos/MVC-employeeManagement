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

    public function newEmployee()
    {
        $this->view->render("employee/index");
    }

    public function getEmployees()
    {
        $employees =  $this->model->get();
        echo json_encode($employees);
    }

    //?este método muestra a un usuario que le pasamos por GET
    //?en app.php recogemos el get y llamamos al meotdo que corresponde con el pase de parametros
    public function showEmployee($param = null)
    {
        $employeeId = $param;
        //?llamamos al modelo para que haga la consultar
        $employee = $this->model->getById("$employeeId");
        //? le pasamos a la vista la informacion
        $this->view->employee = $employee;
        //? le decimos a la vista que pagina debe mostrar
        $this->view->render('dashboard/editEmployee');
    }

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
            header("Location:" . BASE_URL . "dashboard/");
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
            header("Location:" . BASE_URL . "dashboard/");
        }
        //? refrescamos la vista
        // $this->view->render('dashboard/editUser');
    }

    //? a esta funcion se le pasan los parametros por AJAX desde dashboard.js
    public function deleteEmployee($param = null)
    {

        $id = $_POST['id'];

        //?intentamos hacer el delete a la BDD
        if ($this->model->delete($id)) {
            $text = "Exito en la eliminacion";
        } else {
            //? si no, mostramos un error 
            $text = "Error en la eliminacion";
        }

        echo $text;
    }
}
