<?php
$data = [];
if(isLogged() && isStudent()){
    $query = "SELECT
                exams.id,
                discipline.discipline,
                degree.degree,
                l.first_name,
                l.surname,
                l.last_name,
                exams.date_time,
                exams.room,
                exams.max_students,
                type_exam.type_exam
              FROM
                `exams`
              LEFT JOIN
                discipline
              ON
                exams.id_discipline = discipline.id
              LEFT JOIN
                lecturers AS l
              ON
                exams.id_lecturer = l.id
              LEFT JOIN
                degree
              ON
                l.id_degree = degree.id
              LEFT JOIN
                type_exam
              ON exams.id_type = type_exam.id";
    $q = mysqli_query($con, $query);

    while ($result = mysqli_fetch_assoc($q)){
        $data[$result['id']] = $result;
    }

    if (isset($_POST['id_exam'])){
        $errors = [];
        $count_students = mysqli_query($con, "SELECT COUNT(id_student) FROM exams_students WHERE id_exam=".(int)$_POST['id_exam']);
        $count = mysqli_fetch_row($count_students)[0];

        $student_examp = mysqli_query($con, "SELECT id_student FROM exams_students WHERE id_student=".$_SESSION['ID_student']." AND id_exam=".(int)$_POST['id_exam']);
        $student_applied = mysqli_num_rows($student_examp);

        if ($data[(int)$_POST['id_exam']]['max_students'] <= $count ){
            $errors[] = '<p>Не можете да се запишите, вече е попълнена бройката за този изпит</p>';
        }
        elseif ($student_applied !== 0){
            $errors[] = '<p>Не можете да се запишите, вече сте се записали за този изпит</p>';
        }

        if (count($errors) > 0){
            foreach ($errors as $error) {
                echo $error;
            }
        }
        else{
            $add="INSERT INTO exams_students (id_exam, id_student) VALUES ('".(int)$_POST['id_exam']."' ,'".$_SESSION['ID_student']."')";
            $exams_students = mysqli_query($con, $add);
        }
    }
}

render('home', ['exams' => $data]);