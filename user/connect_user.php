<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $txtNama = $_POST['nama'];
        $txtEmail = $_POST['email'];
        $txtPhone = $_POST['no_Telepon'];
        $txtLocation = $_POST['lokasi'];
        $txtProblem = $_POST['problem'];
        $txtImage = $_POST['lampiran'];
    
        $sql = "INSERT INTO user_complaint (nama, email, no_Telepon, lokasi, problem, lampiran)";
        $sql .= "VALUES ('$txtNama', '$txtEmail', '$txtPhone', '$txtLocation', '$txtProblem', '$txtImage')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM user_complaint ORDER BY ID DESC LIMIT 1");
        $result = $ticket -> fetch_assoc();
        $x = $result ['ticket'];

        if (!$hasil) {
            die ('Query failed');
        }
        else {
            header("location:index.php?Ticket=$x");
        }
    }
?>