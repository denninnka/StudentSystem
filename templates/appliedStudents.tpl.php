<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>AppliedStudent</title>
</head>
<body>
    <div style="display: flex">
        <div style="width: 80px"><a href="index.php">Начало</a></div>
        <div style="width: 80px"><a href="index.php?page=logout">Излез</a></div>
    </div>
    <div><h1>Информационна система за записване на студенти за изпит</h1></div>
    <div><h2>Справка за записалите се студенти за изпит по <?=$students[0]['discipline'];?></h2></div>
    <div>
        <table border="1px">
            <thead>
            <tr>
                <th>№</th>
                <th>Студент</th>
                <th>Факултент №</th>
            </tr>
            </thead>
            <tbody>
            <?php


            foreach ($students as $student){

                ?>
                <tr>
                    <td></td>
                    <td><?=$student['first_name'].' '.$student['surname'].' '.$student['last_name'] ;?></td>
                    <td><?=$student['faculty_number'];?></td>
                </tr>
                <?php
            }
            ?>

            </tbody>
        </table>
    </div>
</body>
</html>