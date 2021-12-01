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
                'INSERT INTO users (user_name, user_password, email)
            VALUES(:user_name, :user_password, :email)'
            );
            //? enviamos los datos a la bdd
            $query->execute([
                'user_name' => $data['user_name'],
                'user_password' => $data['user_password'],
                'email' => $data['email'],

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function login($email, $password)
    {
        $query = $this->db->connect()->query("SELECT * FROM users WHERE email='$email'");
        $query = $query->fetch();
        if ($query) {
            if (password_verify($password, $query['password'])) {
                $_SESSION["lastLogin_timeStamp"] = time();
                $_SESSION["userId"] = $query['id'];
                return true;
            }
        }
        return false;
    }
}
