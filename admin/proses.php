<?php
 
session_start(); // untuk mengaktifkan session user
 
 
include 'koneksi.php'; // untuk memanggil class koneksi agar terhubung dengan database
 
$email = $_POST['email']; //menampung data yang dikirim dari input username
$password = $_POST['password']; //menampung data yang dikirim dari input password
 
// $data = mysqli_query($koneksi,"SELECT * from customer WHERE email='$email' and password='$password'");
//untuk mencari data yang sesuai di database yang sesuai dengan inputan
 $data=$koneksi->query("SELECT * from admin WHERE email='$email' and password='$password'");
 
$row=mysqli_fetch_object($data);
//untuk menjadikan data yang didapat menjadi objek
 
$cek_login = mysqli_num_rows($data);
//menghitung jumlah data yang didapat
 
 
if($cek_login > 0) //jika data yang ditemukan lebih dari 0
{
$_SESSION['email'] = $email;
 $_SESSION['nama'] = $row->nama;
$_SESSION['status'] = "login";
$_SESSION['id']= $row->id;
header("location:index.php"); //berpindah ke halaman beranda
}
 
else
{
header("location:login.php?pesan=gagal");
// alert("Gagal simpan Data");
}
?> 