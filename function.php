<?php
/**
 * @var $tpl_name Name of the template
 * @var $tpl_values Values assigned to temlate
 */
function render($tpl_name, $tpl_values = array()){
    foreach ($tpl_values as $key => $value){
        $$key = $value;
    }

    if(file_exists('templates/'.$tpl_name.'.tpl.php')){
        include_once('templates/'.$tpl_name.'.tpl.php');
    } else {
        throw new Exception('template  missing');
    }


}

function isStudent(){
    return isset($_SESSION['ID_student']) AND $_SESSION['ID_student']>0;
}

function isLogged(){
    return isset($_SESSION['is_logged']) AND $_SESSION['is_logged'];
}

