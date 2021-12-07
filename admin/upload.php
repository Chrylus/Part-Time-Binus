<?php 
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
            header("Location: tables.php");
            exit;
        } else if($_FILES['lampiran']['size'] > 2097152){
            header("Location: tables.php");
            exit;
        }

        $nama_file_baru = uniqid() . '.' . $ekstensi;

        move_uploaded_file($tmp_name, '../lampiranimage/' . $nama_file_baru);

        return $nama_file_baru;
    }
?>