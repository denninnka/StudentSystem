<?php
require_once ('function.php');
mb_internal_encoding('UTF-8');
$con = mysqli_connect('localhost', 'root','wdr9173zdv50', 'StudentSystem');
if(!$con){
    die('Could not connect: '.mysqli_error());
}
mysqli_set_charset($con, 'UTF8');
setlocale(LC_ALL, 'bg_BG');
function secure($var)
{
    if (is_array($var)) {
        return array_map('secure', $var);
    } elseif (is_numeric($var)) {
        return (int)$var;
    } else {
        $var = strip_tags($var);
        $var = addslashes($var);
        $var = htmlspecialchars($var, ENT_NOQUOTES);
        return $var;
    }
}

$_POST = array_map("secure", $_POST);
$_GET = array_map("secure", $_GET);
$_COOKIE =array_map("secure", $_COOKIE);
error_reporting(E_ALL);
ini_set('display_errors','on');