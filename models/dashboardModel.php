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
            $query = $this->db->connect()->query(
                'SELECT id,
                        name,
                        email,
                        age,
                        streetAddress,
                        city,
                        state,
                        postalCode,
                        phoneNumber
                FROM employees'
            );
            while ($row = $query->fetch()) {
                $item = [];
                $item['id'] = $row['id'];
                $item['name'] = $row['name'];
                $item['email'] = $row['email'];
                $item['age'] = $row['age'];
                $item['streetAddress'] = $row['streetAddress'];
                $item['city'] = $row['city'];
                $item['state'] = $row['state'];
                $item['postalCode'] = $row['postalCode'];
                $item['phoneNumber'] = $row['phoneNumber'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
    //? trae los datos del usuario pedido por dashboard/showUser
    public function getById($userId)
    {
        //?inicializamos un objeto User
        $item = [];
        //? Buscamos el usuario seleccionado
        $query = $this->db->connect()->prepare("SELECT * FROM employees WHERE id=:id");
        try {
            $query->execute(['id' => $userId]);
            //? lo guardamos
            while ($row = $query->fetch()) {
                $item['id'] = $row['id'];
                $item['name'] = $row['name'];
                $item['lastName'] = $row['lastName'];
                $item['email'] = $row['email'];
                $item['age'] = $row['age'];
                $item['streetAddress'] = $row['streetAddress'];
                $item['city'] = $row['city'];
                $item['state'] = $row['state'];
                $item['postalCode'] = $row['postalCode'];
                $item['phoneNumber'] = $row['phoneNumber'];
            }
            //? lo devolvemos
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }


    public function delete($id)
    {
        //? Borramos el usuario seleccionado
        $query = $this->db->connect()->prepare("DELETE FROM employees WHERE id=:id");
        try {
            $query->execute(['id' => $id]);

            return true;
        } catch (PDOException $e) {
            //? si falla mostramos mensaje de error de la BDD
            echo $e->getMessage();
            return false;
        }
    }
}
