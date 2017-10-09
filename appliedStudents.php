<?php
$data = [];
if(isLogged() && isStudent()){
    $query = "SELECT 
                s.first_name, 
                s.surname, 
                s.last_name, 
                s.faculty_number ,
                d.id,
                d.discipline 
              FROM `exams_students` 
              LEFT JOIN students as s 
                ON exams_students.id_student=s.id 
              LEFT JOIN exams as e 
                ON exams_students.id_exam = e.id 
              LEFT JOIN discipline as d 
                ON e.id_discipline=d.id
              WHERE e.id=".(int)$_GET['id_exam'];
    $q = mysqli_query($con, $query);

    while ($result = mysqli_fetch_assoc($q)){
        $data[] = $result;
    }
}



render('appliedStudents' , ['students' => $data]);
