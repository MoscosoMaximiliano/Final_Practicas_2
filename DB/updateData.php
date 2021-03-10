<?php


    include_once 'session.php';

    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $year = $_POST['year'];

    echo($subject);

    $newDate = date("Y-m-d", strtotime($year));  

    

    $query = "UPDATE subjects SET subject_Name = '$subject', subject_Teacher = '$teacher', subject_Year = '$year' WHERE subject_ID = $id";
    $result = mysqli_query($db, $query);

    $query = "SELECT subject_ID, subject_Name, subject_Teacher, year FROM subjects WHERE subject_ID = '$id'";
    $result = mysqli_query($db, $query);

    $data = $result -> fetch_all(PDO::FETCH_ASSOC);

    print json_encode($data, JSON_UNESCAPED_UNICODE);


    # end logConsole
        

?>