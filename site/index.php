<?php
session_start();
//import config & connect db
require '../config.php';
require '../connectDB.php';

// requiere autoload (lib)
require '../vendor/autoload.php';
//import models

require '../bootstrap.php';

//điều hướng đến controller cụ thể dựa vào tham số trên đường dẫn web
$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';
$controller = ucfirst($c) . 'controller'; //StudentController
// import controller vào hệ thống
require "controller/$controller.php"; //require "controller/StudentController.php"
$controller = new $controller(); //new StudentController();
$controller->$a(); //%controller->index();
