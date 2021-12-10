<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $tanggal_peminjaman = $_POST['tanggal'];
        $nama = $_POST['nama'];
        $nomor_induk = $_POST['nomor_induk'];
        $no_Telepon = $_POST['no_Telepon'];
        $event = $_POST['event'];
        $waktu = $_POST['waktu'];
        $ruangan = $_POST['ruangan'];
        $peralatan = $_POST['peralatan'];
    
        $sql = "INSERT INTO peminjaman (tanggal_peminjaman, nama, nomor_induk, no_Telepon, event, waktu, ruangan, peralatan)";
        $sql .= "VALUES ('$tanggal_peminjaman', '$nama', '$nomor_induk', '$no_Telepon', '$event', '$waktu', '$ruangan', '$peralatan')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM peminjaman ORDER BY ID DESC LIMIT 1");
        $result = $ticket -> fetch_assoc();
        $x = $result ['ticket'];

        if (!$hasil) {
            die ('Query failed');
        }
        else {
            header("location:peminjaman.php?Ticket=$x");
        }  
    }
?>

