<?php
    include_once 'session.php';

    $id = $_POST['id'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
$year = $_POST['year'];

    $newDate = date("Y-m-d", strtotime($year));  

    $query = "INSERT INTO subjects (subject_Name, subject_Teacher, subject_Year, user_ID) 
                VALUES ('$subject', '$teacher', '$newDate', '$user_ID')";
    $result = mysqli_query($db, $query);

    $query = "SELECT subject_ID, subject_Name, subject_Teacher, year FROM subjects WHERE subject_ID = '$id'";
    $result = mysqli_query($db, $query);

    // $data = $result -> fetch_all(PDO::FETCH_ASSOC);

    // print json_encode($data, JSON_UNESCAPED_UNICODE);
    
    echo json_encode(array('success' => 1));
    

?>