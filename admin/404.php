<?php
//Koneksi Database
$connection = mysqli_connect('localhost', 'root', '', 'form_it');
if(!$connection) {
    die("Database connection failed");
}

if(isset($_POST['bsimpan']))
{
    //Pengujian Apakah data akan diedit atau disimpan baru
    if($_GET['hal'] == "edit")
    {
        //Data akan di edit
        $edit = mysqli_query($connection, "UPDATE complaint set
                                            tanggal_end='$_POST[tanggal_end]',
                                             nama = '$_POST[nama]',
                                             email = '$_POST[email]',
                                            no_telepon = '$_POST[no_Telepon]',
                                             lokasi = '$_POST[lokasi]',
                                            problem = '$_POST[problem]',
                                            ticket = '$_POST[ticket]',
                                            PIC=  '$_POST[PIC]',
                                            status=  '$_POST[status]',
                                            klasifikasi = '$_POST[klasifikasi]',
                                            note = '$_POST[note]'
                                         WHERE ID = '$_GET[ID]'");
        if($edit) //jika edit sukses
        {
            echo "<script>
                    alert('Edit data suksess!');
                    document.location='tables.php';
                 </script>";
        }
        else
        {
            echo "<script>
                    alert('Edit data GAGAL!!');
                    document.location='tables.php';
                 </script>";
        }
    }
    else
    {
        //Data akan disimpan Baru
        $simpan = mysqli_query($connection, "INSERT INTO complaint (tanggal_end, nama, email, no_Telepon, lokasi, problem, ticket, PIC,status_ticket, status, klasifikasi, note)
                                            VALUES ('$_POST[tanggal_end]','$_POST[nama]', 
                                              '$_POST[email]', 
                                              '$_POST[no_Telepon]', 
                                              '$_POST[lokasi]',
                                            '$_POST[problem]',
                                            '$_POST[ticket]',
                                            '$_POST[PIC]',
                                            '$_POST[status_ticket]',
                                            '$_POST[status]',
                                            '$_POST[klasifikasi]',
                                            '$_POST[note]')");
        if($simpan) //jika simpan sukses
        {
            echo "<script>
                    alert('Simpan data suksess!');
                    document.location='tables.php';
                 </script>";
        }
        else
        {
            echo "<script>
                    alert('Simpan data GAGAL!!');
                    document.location='tables.php';
                 </script>";
        }
    }
}

//Pengujian jika tombol Edit / Hapus di klik
if(isset($_GET['hal']))
{
    //Pengujian jika edit Data
    if($_GET['hal'] == "edit")
    {
        //Tampilkan Data yang akan diedit
        $tampil = mysqli_query($connection, "SELECT * FROM complaint WHERE ID = '$_GET[ID]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //Jika data ditemukan, maka data ditampung ke dalam variabel
            $txtTanggalEnd = $data['tanggal_end'];
            $txtNama = $data['nama'];
            $txtEmail = $data['email'];
            $txtPhone = $data['no_Telepon'];
            $txtLocation = $data['lokasi'];
            $txtProblem = $data['problem'];
            $txtImage = $data['lampiran'];
            $txtTiket = $data['ticket'];
            $txtPIC = $data['PIC'];
            $txtstatuspengerjaan = $data['status'];
            $txtKlasifikasi = $data ['klasifikasi'];
            $txtNote = $data ['note'];
        }
    }
    else if($_GET['hal'] == "detail"){
        $detail = mysqli_query($connection, "SELECT * FROM complaint WHERE ID = '$_GET[ID]' ");
        $data1 = mysqli_fetch_array($detail);
        if($data1)
        {
            //Jika data ditemukan, maka data ditampung ke dalam variabel
            $detNama = $data1['nama'];
            $detEmail = $data1['email'];
            $detPhone = $data1['no_Telepon'];
            $detLocation = $data1['lokasi'];
            $detProblem = $data1['problem'];
            $detImage = $data1['lampiran'];
            $detTiket = $data1['ticket'];
            $detPIC = $data1['PIC'];
            $detstatuspengerjaan = $data1['status'];
        }
    }
    else if ($_GET['hal'] == "hapus")
    {
        //Persiapan hapus data
        $hapus = mysqli_query($connection, "DELETE FROM complaint WHERE ID = '$_GET[ID]' ");
        if($hapus)
        {
            echo "<script>
                    alert('Hapus Data Suksess!!');
                    document.location='tables.php';
                 </script>";
        }
    }
}
?>
<html>
<head>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">

				<div class="data-tables datatable-dark">
                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Command</th>
                                            <th>Tanggal_Masuk</th>
                                            <th>Tanggal_Selesai</th>
                                            <th>Tiket</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_Telepon</th>
                                            <th>Lokasi</th>
                                            <th>Problem</th>
                                            <th>Lampiran</th>
                                            <th>PIC</th>
                                            <th>Status_Tiket</th>
                                            <th>Status_Pengerjaan</th>
                                            <th>Klasifikasi</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Command</th>
                                            <th>Tanggal_Masuk</th>
                                            <th>Tanggal_Selesai</th>
                                            <th>Tiket</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_Telepon</th>
                                            <th>Lokasi</th>
                                            <th>Problem</th>
                                            <th>Lampiran</th>
                                            <th>PIC</th>
                                            <th>Status_Tiket</th>
                                            <th>Status_Pengerjaan</th>
                                            <th>Klasifikasi</th>
                                            <th>Note</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?php
                                            $no = 1;
                                            $tampil = mysqli_query($connection, "SELECT * from complaint order by ID desc");
                                            while($data = mysqli_fetch_array($tampil)) :
                                        ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><center>
                                                <a href="tables.php?hal=edit&ID=<?=$data['ID']?>" class="btn btn-warning"> Edit </a><br><br>
                                                <a href="detail.php?hal=detail&ID=<?=$data['ID']?>" class="btn btn-warning" >Detail</a></center>
                                            </td>
                                            <td><?=$data['tanggal_start']?></td>
                                            <td><?=$data['tanggal_end']?></td>
                                            <td><?=$data['ticket']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['email']?></td
                                            ><td><?=$data['no_Telepon']?></td>
                                             <td><?=$data['lokasi']?> </td>
                                            <td><?=$data['problem']?></td>
                                            <td><?=$data['lampiran']?></td>
                                            <td><?=$data['PIC']?></td>
                                            <td><?=$data['status_ticket']?></td>
                                            <td><?=$data['status']?></td>
                                            <td><?=$data['klasifikasi']?></td>
                                            <td><?=$data['note']?></td>
                                        </tr>
                                        <?php endwhile; //penutup perulangan while ?>           
                                    </tbody>
                                </table>
                            </div>
					
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>