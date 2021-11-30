<?php
//? clase molde para todas las vistas

class View
{
    function __construct()
    {
    }

    //? método que renderiza las vistas
    function render($name)
    {
        require 'views/' . $name . '.php';
    }
}
