<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $lt = $_POST['lt_ruangan'];
        $no = $_POST['no_ruangan'];
        $masalah = $_POST['problem'];
    
        $sql = "INSERT INTO class_complaint (lt_ruangan, no_ruangan, problem)";
        $sql .= "VALUES ('$lt', '$no', '$masalah')";

        $hasil = mysqli_query($connection, $sql);

        if (!$hasil) {
            die ('Query failed');
          }
        else {
            echo "Record Created";
        }  
    }
?>

