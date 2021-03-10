<?php
    include_once 'session.php';

    $id = $_POST['id'];

    echo($subject);

    $newDate = date("Y-m-d", strtotime($year));  

    $query = "DELETE FROM subjects WHERE subject_ID = '$id'";
    $result = mysqli_query($db, $query);

    

?>