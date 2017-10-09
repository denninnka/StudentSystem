<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>StudentSystem</title>
    </head>
    <body>
    <?php
    if (!isLogged() && !isStudent()){
        ?>
        <div style="display: flex">
            <div style="width: 80px"><a href="index.php">Начало</a></div>
            <div><a href="index.php?page=login">Влез</a></div>
        </div>
        <div><h1>Информационна система за записване на студенти за изпит</h1></div>
        <div><h2>За да се запишите за изпит трябва да влезете в системата! <a href="index.php?page=login">Влез</a></h2></div>

    <?php
    } else {
    ?>
        <div style="display: flex">
            <div style="width: 80px"><a href="index.php">Начало</a></div>
            <div><a href="index.php?page=logout">Излез</a></div>
        </div>
        <div><h1>Информационна система за записване на студенти за изпит</h1></div>
        <div>
            <table border="1px">
                <thead>
                <tr>
                    <th>Дисциплина</th>
                    <th>Преподавател</th>
                    <th>Зала</th>
                    <th>Дата и час</th>
                    <th>Max студенти</th>
                    <th>Вид изпит</th>
                    <th>Записване</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($exams as $exam){
                ?>
                <tr>
                    <td><a href="index.php?page=appliedStudents&id_exam=<?=$exam['id'] ;?>"><?=$exam['discipline'] ;?></a></td>
                    <td><?=$exam['degree'].' '.$exam['first_name'].' '.$exam['surname'].' '.$exam['last_name'] ;?></td>
                    <td><?=$exam['room'];?></td>
                    <td><?=$exam['date_time'] ;?></td>
                    <td><?=$exam['max_students'];?></td>
                    <td><?=$exam['type_exam'];?></td>
                    <td><form action="" method="POST"><button type="submit" value="<?=$exam['id'] ;?>" name="id_exam">Запиши</button></form></td>
                </tr>
                <?php
                    }
                ?>

                </tbody>
            </table>
        </div>

    <?php } ?>

    </body>
</html>
