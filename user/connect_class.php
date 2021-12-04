<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $lt = $_POST['lt_ruangan'];
        $no = $_POST['no_ruangan'];
        $masalah = $_POST['problem'];
    
        $sql = "INSERT INTO complaint (nama, email, no_Telepon, lokasi, problem)";
        $sql .= "VALUES ('Dosen', '-', '-', '$lt - $no', '$masalah')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM complaint ORDER BY ID DESC LIMIT 1");
        $result = $ticket -> fetch_assoc();
        $x = $result ['ticket'];

        if (!$hasil) {
            die ('Query failed');
        }
        else {
            header("location:kelas.php?Ticket=$x");
        }  
    }
?>

