<?php

class userModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //? Método que interactura directamente con la bdd y recibe los datos del controlador
    public function insert($data)
    {
        try {
            //? db es una instancia de Database, creada en model.php 
            //? llamamos a su método connect()
            //? usamos prepare statement para evitar SQLinjection
            $query = $this->db->connect()->prepare(
                //? referenciamos la tabla, los campos y los valores
                'INSERT INTO users (name, password, email)
                VALUES(:name, :password, :email)'
            );
            //? enviamos los datos a la bdd
            $query->execute([
                'name' => $data['name'],
                'password' => $data['password'],
                'email' => $data['email'],

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //? Método que interactura directamente con la bdd y recibe los datos del controlador
    public function get($name = "")
    {
        $items = [];
        try {
            $query = $this->db->connect()->query("SELECT * FROM users WHERE name !='admin' AND name !='$name'");

            while ($row = $query->fetch()) {
                $item = new User();
                $item->name = $row['name'];
                $item->password = $row['password'];
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
        $query = $this->db->connect()->prepare("SELECT * FROM users WHERE name=:name");
        try {
            $query->execute(['name' => $userName]);
            //? lo guardamos
            while ($row = $query->fetch()) {
                $item->name = $row['name'];
                $item->password = $row['password'];
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
        //todo no esta hecho con el metodo "normal" de prepare-execute, name = : name 
        //todo porque me daba Error: SQLSTATE[HY093]: Invalid parameter number
        $query = $this->db->connect()->prepare(
            "UPDATE users SET name='$item[name]', password='$item[password]', email='$item[email]' WHERE name = '$item[name]'"
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
        $query = $this->db->connect()->prepare("DELETE FROM users WHERE name=:name");
        try {
            $query->execute(['name' => $userName]);

            return true;
        } catch (PDOException $e) {
            //? si falla mostramos mensaje de error de la BDD
            echo $e->getMessage();
            return false;
        }
    }

    function login($email, $password)
    {
        $query = $this->db->connect()->query("SELECT * FROM users WHERE email='$email'");
        if ($query) {
            $user = $query->fetch();

            if (password_verify($password, $user['password'])) {
                $_SESSION["lastLogin_timeStamp"] = time();
                $_SESSION["userId"] = $user['id'];
                return $user;
            }
        }
        return false;
    }
}
