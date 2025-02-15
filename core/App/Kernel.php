<?php

namespace App;

class Kernel
{

    /*
     * voir la doc -> home
     * voir le site -> jeux
     */
    public static function run(){

        $type = "jeux";
        $action = "index";

        if(!empty($_GET['type'])){ $type = $_GET['type']; };
        if(!empty($_GET['action'])){ $action = $_GET['action']; };

        $type = ucfirst($type);
        $controllerName = "\Controllers\\".$type."Controller";

        $controller = new $controllerName();

        $controller->$action();
        }
}