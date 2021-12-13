
<?php
$connection = new mysqli('localhost', 'root', '');  
mysqli_select_db($connection, 'form_it');  





if(isset($_GET['bulan'])){
    $bulan = $_GET['bulan'];
    $setSql = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where MONTH (tanggal_start) = $bulan AND YEAR (tanggal_start) = YEAR (CURDATE())";  
    $setRec = mysqli_query($connection, $setSql);  
    $columnHeader = '';  
    $columnHeader = "ID" . "\t" . "Tanggal Pengajuan" . "\t" . "Tanggal Peminjaman" . "\t " . "tanggal Pengembalian" . "\t" . "Nama" . "\t" . "No Induk" . "\t" . "No Telepon" . "\t" . "Event" . "\t" . "Waktu" . "\t" . "Waktu Pengembalian" . "\t" . "Ruangan" . "\t" . "Peralatan" . "\t" . "Tiket" . "\t" . "Status";  
   
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
    header("Content-Disposition: attachment; filename=DataPeminjaman.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n";      
} 
else {
    $setSql = "SELECT `ID`, `tanggal_start`, `tanggal_peminjaman`, `tanggal_pengembalian`, `nama`, `nomor_induk`, `no_Telepon`, `event`, `waktu`, `waktu_pengembalian`, `ruangan`, `peralatan`, `ticket`, `status` FROM `peminjaman` where YEAR (tanggal_start) = YEAR (CURDATE()) ";  
    $setRec = mysqli_query($connection, $setSql); 
    $columnHeader = '';  
    $columnHeader = "ID" . "\t" . "Tanggal Pengajuan" . "\t" . "Tanggal Peminjaman" . "\t " . "tanggal Pengembalian" . "\t" . "Nama" . "\t" . "No Induk" . "\t" . "No Telepon" . "\t" . "Event" . "\t" . "Waktu" . "\t" . "Waktu Pengembalian" . "\t" . "Ruangan" . "\t" . "Peralatan" . "\t" . "Tiket" . "\t" . "Status";  
   
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
    header("Content-Disposition: attachment; filename=DataPeminjaman.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n";        
}


?>