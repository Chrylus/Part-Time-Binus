<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:login.php");
    }
    
	//Koneksi Database
    include ("koneksi.php");

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
						alert('Edit data Sukses!');
						document.location='tables_open.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='tables_open.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($connection, "INSERT INTO complaint (tanggal_end, nama, email, no_Telepon, lokasi, problem, ticket, PIC, status, klasifikasi, note)
										        VALUES ('$_POST[tanggal_end]','$_POST[nama]', 
										  		'$_POST[email]', 
										  		'$_POST[no_Telepon]', 
										  		'$_POST[lokasi]',
                                                '$_POST[problem]',
                                                '$_POST[ticket]',
                                                '$_POST[PIC]',
                                                '$_POST[status]',
                                                '$_POST[klasifikasi]',
                                                '$_POST[note]')");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data Sukses!');
						document.location='tables_open.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='tables_open.php';
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
						document.location='tables_open.php';
				     </script>";
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Table Open Ticket</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="icon" href="../user/images/Binus Logo.png">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#0090D1">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php 
                        if (isset($_SESSION["id"])) 
                        {              
                            echo($_SESSION['nama']);
                        }
                    ?>    
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ticket</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ticket:</h6>
                        <a class="collapse-item" href="tables.php">All</a>
                        <a class="collapse-item" href="#">Open</a>
                        <a class="collapse-item" href="tables_close.php">Close</a>
                        <a class="collapse-item" href="tables_on_progress.php">On Progress</a>
                        <a class="collapse-item" href="tables_overdue.php">Overdue</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Artikel</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables_event.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Event</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables_peminjaman.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Peminjaman</span></a>
            </li>

            <div class="sidebar-heading">
                Administrator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pic.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>PIC</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reminder.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reminder</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="report.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Report</span>
                </a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                        if (isset($_SESSION["id"])) 
                                        {              
                                        echo($_SESSION['nama']);
                                        }
                                        else 
                                        {
                                        echo "Login";
                                        }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <?php
                                    if (isset($_SESSION["id"])) 
                                    {              
                                        echo '<a href="logout.php" class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout </a>';
                                    }
                                    else 
                                    {
                                        echo '<a href="login.php" class="dropdown-item"  >
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Login </a>';
                                    }
                                    ?>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <div class="card-header  text-white" style="background-color:#0090D1">
	                Form Input Data
	            </div>
	            <div class="card-body">
                <form method="post" action="">
                    Tanggal Selesai
                    <div class="complaint-form-category">
                        <input type="date" name="tanggal_end" class="form-control" placeholder="Tanggal Selesai *" value="<?=@$txtTanggalEnd?>" ></textarea>
                    </div>
                    <br>
                    <div class="complaint-form-category">
                        <input type="text" name="nama" class="form-control" placeholder="Nama *" value="<?=@$txtNama?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="email" class="form-control" placeholder="Email *" value="<?=@$txtEmail?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="no_Telepon" class="form-control" placeholder="Nomor Telepon *"value="<?=@$txtPhone?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi *" value="<?=@$txtLocation?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="problem" class="form-control" placeholder="problem *" value="<?=@$txtProblem?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="ticket" class="form-control" placeholder="tiket *" value="<?=@$txtTiket?>"></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="PIC" class="form-control" placeholder="PIC *" value="<?=@$txtPIC?>" ></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="status" class="form-control" placeholder="Status *" value="<?=@$txtstatuspengerjaan?>" ></textarea>
                    </div>
                    <div class="complaint-form-category">
                        <input list ="text" name="klasifikasi" class="form-control" placeholder="Klasifikasi *" value="<?=@$txtKlasifikasi?>" ></textarea>
                        <datalist id="text">
                                <option value="OS">
                                <option value="Application">
                                <option value="Hardware">
                                <option value="Network">
                                <option value="Human Error">
                                <option value="Class">
                    </div>
                    <div class="complaint-form-category">
                        <input type="text" name="note" class="form-control" placeholder="Note *" value="<?=@$txtNote?>" ></textarea>
                    </div>
                        <br><br>
                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                        <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                        <a href="tables_open.php?hal=hapus&ID=<?=$data['ID']?>" 
                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                </form>
                <div class="modal fade" id="demoModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">Please confirm!</h2>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?=$detEmail?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Table</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ticket</th>
                                            <th>Nama</th>
                                            <th>Tanggal_Masuk</th>
                                            <th>problem</th>
                                            <th>No_Telepon</th>
                                            <th>Lokasi</th>
                                            <th>Command</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Ticket</th>
                                            <th>Nama</th>
                                            <th>Tanggal_Masuk</th>
                                            <th>problem</th>
                                            <th>No_Telepon</th>
                                            <th>Lokasi</th>
                                            <th>Command</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $tampil = mysqli_query($connection, "SELECT * from complaint WHERE status_ticket = 'Open' order by ID desc");
                                            while($data = mysqli_fetch_array($tampil)) :
                                        ?>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$data['ticket']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['tanggal_start']?></td>
                                            <td><?=$data['problem']?></td>
                                            <td><?=$data['no_Telepon']?></td>
                                            <td><?=$data['lokasi']?> </td>
                                            <td>
                                                <a href="tables_open.php?hal=edit&ID=<?=$data['ID']?>" class="btn btn-warning"> Edit </a>
                                                <a href="detail_open.php?hal=detail&ID=<?=$data['ID']?>" class="btn btn-warning" >Detail</a>
                                            </td>
                                        </tr>
                                        <?php endwhile; //penutup perulangan while ?>           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>