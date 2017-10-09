<?php
session_start();
require 'config.php';

$p= 'home';
if (isset($_GET['page'])){
    $p = $_GET['page'];
}

switch ($p){
    default:
        $page = 'home.php';
        break;
    case 'login':
        $page = 'login.php';
        break;
    case 'appliedStudents':
        $page = 'appliedStudents.php';
        break;
    case 'logout':
        session_destroy();
        $_SESSION = array();
        $page = 'logout.php';
        break;

}

require_once $page;
?>