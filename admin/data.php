<?php
$connection = new mysqli('localhost', 'root', '');  
mysqli_select_db($connection, 'form_it');  


if(isset($_GET['bulan'])){
    $bulan = $_GET['bulan'];
    $setSql = "SELECT `ID`, `tanggal_start`, `tanggal_end`, `nama`, `email`, `no_Telepon`, `lokasi`, `problem`, `lampiran`, `ticket`, `PIC`, `status_ticket`, `status`, `klasifikasi`, `note` FROM `complaint` where MONTH (tanggal_start) = $bulan AND YEAR (tanggal_start) = YEAR (CURDATE())";  
    $setRec = mysqli_query($connection, $setSql);
    $columnHeader = '';  
    $columnHeader = "ID" . "\t" . "Tanggal Start" . "\t" . "Tanggal End" . "\t " . "Nama" . "\t" . "Email" . "\t" . "No Telepon" . "\t" . "Lokasi" . "\t" . "Problem" . "\t" . "Lampiran" . "\t" . "Ticket" . "\t" . "PIC" . "\t" . "Status Ticket" . "\t" . "Status" . "\t" . "Klasifikasi" . "\t" . "Note";  
    
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
else {
    $setSql = "SELECT `ID`, `tanggal_start`, `tanggal_end`, `nama`, `email`, `no_Telepon`, `lokasi`, `problem`, `lampiran`, `ticket`, `PIC`, `status_ticket`, `status`, `klasifikasi`, `note` FROM `complaint` where YEAR (tanggal_start) = YEAR (CURDATE())";  
    $setRec = mysqli_query($connection, $setSql);
    $columnHeader = '';  
$columnHeader = "ID" . "\t" . "Tanggal Start" . "\t" . "Tanggal End" . "\t " . "Nama" . "\t" . "Email" . "\t" . "No Telepon" . "\t" . "Lokasi" . "\t" . "Problem" . "\t" . "Lampiran" . "\t" . "Ticket" . "\t" . "PIC" . "\t" . "Status Ticket" . "\t" . "Status" . "\t" . "Klasifikasi" . "\t" . "Note";  
   
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





?>