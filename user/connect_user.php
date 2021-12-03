<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $txtDate = $_POST['tanggal'];
        $txtNama = $_POST['nama'];
        $txtEmail = $_POST['email'];
        $txtPhone = $_POST['no_Telepon'];
        $txtLocation = $_POST['lokasi'];
        $txtProblem = $_POST['problem'];
        $txtImage = $_POST['lampiran'];
    
        $sql = "INSERT INTO user_complaint (tanggal, nama, email, no_Telepon, lokasi, problem, lampiran)";
        $sql .= "VALUES ('$txtDate', '$txtNama', '$txtEmail', '$txtPhone', '$txtLocation', '$txtProblem', '$txtImage')";

        $hasil = mysqli_query($connection, $sql);

        if (!$hasil) {
            die ('Query failed');
          }
        else {
            echo "Record Created";
        }
    }
?>