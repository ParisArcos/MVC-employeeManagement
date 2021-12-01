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



    //? a esta funcion se le pasan los parametros por AJAX desde dashboard.js
    public function deleteEmployee($param = null)
    {
        $id = $param;
        echo $id;
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
