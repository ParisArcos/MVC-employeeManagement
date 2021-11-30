<?php

class Model
{
    function __construct()
    {
        //?establecemos la conexión a la base de datos
        $this->db = new Database();
    }
}
