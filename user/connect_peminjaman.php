<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian']; //
        $nama = $_POST['nama'];
        $nomor_induk = $_POST['nomor_induk'];
        $no_Telepon = $_POST['no_Telepon'];
        $event = $_POST['event'];
        $waktu = $_POST['waktu'];
        $waktu_pengembalian = $_POST['waktu_pengembalian'];
        $ruangan = $_POST['ruangan'];
        $peralatan = $_POST['peralatan'];
    
        $sql = "INSERT INTO peminjaman (tanggal_peminjaman, tanggal_pengembalian, nama, nomor_induk, no_Telepon, event, waktu, waktu_pengembalian, ruangan, peralatan)";
        $sql .= "VALUES ('$tanggal_peminjaman', '$tanggal_pengembalian', '$nama', '$nomor_induk', '$no_Telepon', '$event', '$waktu', '$waktu_pengembalian', '$ruangan', '$peralatan')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM peminjaman ORDER BY ID DESC LIMIT 1");
        $result = $ticket -> fetch_assoc();
        $x = $result ['ticket'];

        $email_from = 'noreply@itmalang@dtlcreate.com';
        $to       = "$email";
        $subject  = 'Your Recepient';
        $message  =  "Tiket Anda:$x\n";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $Email \r\n";


        if (!$hasil) {
            die ('Query failed');
        }
        else {
            mail($to,$subject,$message,$headers); 
            header("location:peminjaman.php?Ticket=$x");
        }  
    }
?>

