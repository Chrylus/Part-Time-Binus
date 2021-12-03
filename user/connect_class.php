<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $lt = $_POST['lt_ruangan'];
        $no = $_POST['no_ruangan'];
    
        $sql = "INSERT INTO class_complaint (lt_ruangan, no_ruangan)";
        $sql .= "VALUES ('$lt', '$no')";

        $hasil = mysqli_query($connection, $sql);

        if (!$hasil) {
            die ('Query failed');
          }
        else {
            echo "Record Created";
        }  
    }
?>

