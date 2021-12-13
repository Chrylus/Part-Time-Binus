<?php
    include ("connect_database.php");

    if(isset($_POST['submit'])) {
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $tanggal_selesai = $_POST['tanggal_selesai']; //
        $nama = $_POST['nama'];
        $nomor_induk = $_POST['nomor_induk'];
        $no_Telepon = $_POST['no_Telepon'];
        $event = $_POST['event'];
        $waktu_mulai = $_POST['waktu_mulai'];
        $waktu_selesai = $_POST['waktu_selesai'];
        $ruangan = $_POST['ruangan'];
        $detail_event = $_POST['detail_event'];
    
        $sql = "INSERT INTO event (tanggal_mulai, tanggal_selesai, nama, nomor_induk, no_Telepon, event, waktu_mulai, waktu_selesai, ruangan, detail_event)";
        $sql .= "VALUES ('$tanggal_mulai', '$tanggal_selesai', '$nama', '$nomor_induk', '$no_Telepon', '$event', '$waktu_mulai', '$waktu_selesai', '$ruangan', '$detail_event')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM event ORDER BY ID DESC LIMIT 1");
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
            header("location:event.php?Ticket=$x");
        }  
    }
?>

