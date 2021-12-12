<?php
    include ("connect_database.php");

    // Submit
    function upload(){
        $data = $_FILES;
        //gambar
        $nama_gambar = $data['lampiran']['name'];
        $tmp_name = $data['lampiran']['tmp_name'];
    
        //cek gambar
        $ekstensi_gambar = ['jpg', 'jpeg', 'png'];
        $ekstensi_gambar_upload = explode('.', $nama_gambar);
        $ekstensi = strtoLower(end($ekstensi_gambar_upload));
    
        if(!in_array($ekstensi, $ekstensi_gambar)){
            header("Location: index.php");
            exit;
        } else if($_FILES['lampiran']['size'] > 2097152){
            header("Location: index.php");
            exit;
        }
    
        $nama_file_baru = uniqid() . '.' . $ekstensi;
    
        move_uploaded_file($tmp_name, '../lampiranimage/' . $nama_file_baru);
    
        return $nama_file_baru;
    }
    
    // Insert and View
    if(isset($_POST['submit'])) {
        $txtNama = $_POST['nama'];
        $txtEmail = $_POST['email'];
        $txtPhone = $_POST['no_Telepon'];
        $txtLocation = $_POST['lokasi'];
        $txtProblem = $_POST['problem'];
        $txtImage = upload();
    
        $sql = "INSERT INTO complaint (nama, email, no_Telepon, lokasi, problem, lampiran)";
        $sql .= "VALUES ('$txtNama', '$txtEmail', '$txtPhone', '$txtLocation', '$txtProblem', '$txtImage')";

        $hasil = mysqli_query($connection, $sql);

        $ticket = mysqli_query($connection, "SELECT ticket FROM complaint ORDER BY ID DESC LIMIT 1");
        $result = $ticket -> fetch_assoc();
        $x = $result ['ticket'];

        $email_from = 'noreply@lembahtumpang.xyz';
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
            header("location:index.php?Ticket=$x");
        }
    }
?>