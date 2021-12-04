
<?php
//Include file koneksi ke database
include 'koneksi.php';

//menerima nilai dari kiriman form pendaftaran
$nama = $_POST['nama'];
$email = $_POST['email']; //menampung data yang dikirim dari input username
$password = $_POST['password']; //menampung data yang dikirim dari input password



//Query input menginput data kedalam tabel anggota
  $sql="INSERT INTO `admin`( `nama`, `email`, `password`) VALUES ('$nama','$email','$password')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);
echo"$nama";
echo"$email";
echo"$password";
echo"$hasil";
//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	header("location:login.php"); 
  }
else {
echo"gagal";
	exit;
}  

?>