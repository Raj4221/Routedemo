<?php
require_once "../app/libraries/Core.php";
$router=new Core();
$router->get("/mvcframework/pages/insertrecord","Pages@insertrecord");
$router->get("/mvcframework/","Pages@index");
$router->get("/mvcframework/Pages/deleterecord","Pages@deleterecord");
$router->get("/mvcframework/Pages/editrecord","Pages@editrercord");
$router->get("/mvcframework/pages/updaterecord","Pages@updaterecord");

