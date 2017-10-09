<?php
$errors = array();
if(isset($_POST['submitLogin'])){
    if($_POST['username'] =='')
        $errors[] = 'Потребителското име е задължително';
    elseif ($_POST['password'] =='') {
        $errors[] = 'Паролата е задължителна';
    }
    if(count($errors) == 0){
        $res = mysqli_query($con,'SELECT * FROM students 
                                  WHERE username = "'.mysqli_real_escape_string($con, $_POST['username']).'"');
        if($res == false){
            $errors[] = mysqli_error();
        } elseif(mysqli_num_rows($res) ==0){
            $errors[] = 'Няма такъв студент!';
        } else {
            $danni = mysqli_fetch_assoc($res);

            if(!password_verify($_POST['password'], $danni['password'])){
                $errors[] = 'Няма такъв студент!';
            }else{
                $_SESSION['ID_student'] = $danni['id'];
                //$_SESSION['ime'] = $danni['user'];
                $_SESSION['username'] = $danni['username'];
                $_SESSION['is_logged'] = true;
                $_SESSION['student'] = true;
                $_SESSION['success'] = 'Успешно влизане в системата';
                header('Location: index.php');
            }
        }
    }
}

if(count($errors) > 0){
    echo '<div>';
    foreach ($errors as $value) {
        echo '<p>'.$value.'</p>';
    }
    echo '</div>';
}
render ('login');
?>