<?php

include_once "libs/user.php";

class dashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //? Método que interactura directamente con la bdd y recibe los datos del controlador
    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->query('SELECT * FROM users');

            while ($row = $query->fetch()) {
                $item = new User();
                $item->user_name = $row['user_name'];
                $item->user_password = $row['user_password'];
                $item->email = $row['email'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
    //? trae los datos del usuario pedido por dashboard/showUser
    public function getById($userName)
    {
        //?inicializamos un objeto User
        $item = new User();
        //? Buscamos el usuario seleccionado
        $query = $this->db->connect()->prepare("SELECT * FROM users WHERE user_name=:user_name");
        try {
            $query->execute(['user_name' => $userName]);
            //? lo guardamos
            while ($row = $query->fetch()) {
                $item->user_name = $row['user_name'];
                $item->user_password = $row['user_password'];
                $item->email = $row['email'];
            }
            //? lo devolvemos
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    //? Actualiza los datos del usuario pasado por dashboard/updateUser
    public function update($item)
    {
        //? preparamos la query
        //todo no esta hecho con el metodo "normal" de prepare-execute, user_name = : user_name 
        //todo porque me daba Error: SQLSTATE[HY093]: Invalid parameter number
        $query = $this->db->connect()->prepare(
            "UPDATE users SET user_name='" . $item['user_name'] . "', user_password='" . $item['user_password'] . "', email='" . $item['email'] . "' WHERE user_name = '" . $item['user_name'] . "'"
        );
        try {
            //? actualizamos
            $query->execute();
            return true;
        } catch (PDOException $e) {
            //? si falla mostramos mensaje de error de la BDD
            echo $e->getMessage();
            return false;
        }
    }


    public function delete($userName)
    {
        //? Borramos el usuario seleccionado
        $query = $this->db->connect()->prepare("DELETE FROM users WHERE user_name=:user_name");
        try {
            $query->execute(['user_name' => $userName]);

            return true;
        } catch (PDOException $e) {
            //? si falla mostramos mensaje de error de la BDD
            echo $e->getMessage();
            return false;
        }
    }
}
