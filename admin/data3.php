<?php
$connection = new mysqli('localhost', 'root', '');  
mysqli_select_db($connection, 'form_it');  
  
$setSql = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman`";  
$setRec = mysqli_query($connection, $setSql);  

$setSql1 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 1 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec1 = mysqli_query($connection, $setSql1);  

$setSql2 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 2 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec2 = mysqli_query($connection, $setSql2);  

$setSql3 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 3 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec3 = mysqli_query($connection, $setSql3);  

$setSql4 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 4 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec4 = mysqli_query($connection, $setSql4);  

$setSql5 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 5 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec5 = mysqli_query($connection, $setSql5);  

$setSql6 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 6 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec6 = mysqli_query($connection, $setSql6);  

$setSql7 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 7 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec7 = mysqli_query($connection, $setSql7);  

$setSql8 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 8 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec8 = mysqli_query($connection, $setSql8);  

$setSql9 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 9 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec9 = mysqli_query($connection, $setSql9);  

$setSql10 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 10 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec10 = mysqli_query($connection, $setSql10);  

$setSql11 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 11 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec11 = mysqli_query($connection, $setSql11);  

$setSql12 = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = 12 AND YEAR (tanggal_start) = YEAR (CURDATE())";  
$setRec12 = mysqli_query($connection, $setSql12);  
if($setRec){
$columnHeader = '';  
$columnHeader = "ID" . "\t" . "Tanggal Start" . "\t" . "Tanggal Peminjaman" . "\t " . "Tanggal Pengembalian" . "\t" . "Nama" . "\t" . "Nomor Induk" . "\t" . "No Telepon" . "\t" . "Event" . "\t" . "Waktu" . "\t" . "Waktu Pengembalian" . "\t" . "Ruangan" . "\t" . "Peralatan" . "\t" . "Tiket" . "\t" . "Status";  
   
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=Data.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
}
else if($setRec1){
    $columnHeader = '';  
$columnHeader = "ID" . "\t" . "Tanggal Start" . "\t" . "Tanggal Peminjaman" . "\t " . "Tanggal Pengembalian" . "\t" . "Nama" . "\t" . "Nomor Induk" . "\t" . "No Telepon" . "\t" . "Event" . "\t" . "Waktu" . "\t" . "Waktu Pengembalian" . "\t" . "Ruangan" . "\t" . "Peralatan" . "\t" . "Tiket" . "\t" . "Status"; 
       
    $setData = '';  
      
    while ($rec = mysqli_fetch_row($setRec1)) {  
        $rowData = '';  
        foreach ($rec as $value) {  
            $value = '"' . $value . '"' . "\t";  
            $rowData .= $value;  
        }  
        $setData .= trim($rowData) . "\n";  
    }  
      
      
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=Data.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n"; 

}


?>