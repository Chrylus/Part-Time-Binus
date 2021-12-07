<?php

   session_start();
   if(!isset($_SESSION["id"])){
     header("location:login.php");
   }
 

   
	//Koneksi Database

    // include '../user/connect_database.php';
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
                                                  PIC=  '$_POST[PIC]',
                                                 ticket = '$_POST[ticket]'
                                                
											 WHERE ID = '$_GET[ID]'
										   ");
			if($edit) //jika edit sukses
			{
				echo "<script>
						alert('Edit data suksess!');
						document.location='tester.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Edit data GAGAL!!');
						document.location='tester.php';
				     </script>";
			}
		}
		else
		{
			//Data akan disimpan Baru
			$simpan = mysqli_query($connection, "INSERT INTO complaint (tanggal_end,nama, email, no_Telepon, lokasi, problem,PIC, ticket)
										  VALUES ('$_POST[tanggal_end]','$_POST[nama]', 
										  		 '$_POST[email]', 
										  		 '$_POST[no_Telepon]', 
										  		 '$_POST[lokasi]',
                                                '$_POST[problem]',
                                                '$_POST[PIC]',
                                                '$_POST[ticket]'
                                                   )
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='datatabel.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='tester.php';
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
            
				$txtNama = $data['nama'];
                $txtEmail = $data['email'];
                $txtPhone = $data['no_Telepon'];
                $txtLocation = $data['lokasi'];
                $txtProblem = $data['problem'];
                $txtImage = $data['lampiran'];
                $txtTiket = $data['ticket'];
                 $txtPIC = $data['PIC'];
                $txtstatuspengerjaan = $data['status'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($connection, "DELETE FROM complaint WHERE ID = '$_GET[ID]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='datatabel.php';
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

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                if (isset($_SESSION["id"])) {              
                     echo($_SESSION['nama']);
                            }
                
                            ?>    
                
                
                </div>
                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" style="background-color:#0090D1">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php 
                            if (isset($_SESSION["id"])) {              
                           echo($_SESSION['nama']);
                            }
                            else {
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
                                if (isset($_SESSION["id"])) {              
                            echo '<a href="logout.php" class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout </a>';
                            }
                            else {
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
        <!-- $txtNama = $_POST['nama'];
                $txtEmail = $_POST['email'];
                $txtPhone = $_POST['no_Telepon'];
                $txtLocation = $_POST['lokasi'];
                $txtProblem = $_POST['problem'];
                $txtImage = $_POST['lampiran'];
                $txtTiket = $_POST['ticket']; -->
	  </div>
	  <div class="card-body">
      <form method="post" action="">
        <div class="complaint-form-category">
            <input type="date" name="tanggal_end" class="form-control" placeholder="tanggal selesai *" value="<?=@$txttanggalselesai?>" ></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="nama" class="form-control" placeholder="Nama *" value="<?=@$txtNama?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="email" class="form-control" placeholder="Email *" value="<?=@$txtEmail?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="no_Telepon" class="form-control" placeholder="Nomor Telepon *"value="<?=@$txtPhone?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="lokasi" class="form-control" placeholder="Lokasi *" value="<?=@$txtLocation?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="problem" class="form-control" placeholder="problem *" value="<?=@$txtProblem?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="ticket" class="form-control" placeholder="tiket *" value="<?=@$txtTiket?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="PIC" class="form-control" placeholder="PIC *" value="<?=@$txtPIC?>" required></textarea>
        </div>
        <div class="complaint-form-category">
            <input type="text" name="status pengerjaan" class="form-control" placeholder="status pengerjaan *" value="<?=@$txtstatuspengerjaan?>" required></textarea>
        </div>
            <br><br>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
            <a href="datatabel.php?hal=hapus&ID=<?=$data['ID']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
            <!-- /*tanggal	nama	email	no_Telepon	lokasi	problem	lampiran	ticket	 -->

	    </form>
        <br><br>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Table</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

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
                                            <th>no</th>
                                            <th>tanggal_mulai</th>
                                            <th>tanggal_selesai</th>
                                            <th>Nama</th>
                                            <th>no_telepon</th>
                                            <th>Lokasi</th>
                                            <th>problem</th>
                                            <th>lampiran</th> 
                                            <th>ticket</th>
                                            <th>PIC</th>
                                            <th>status_ticket</th>
                                            <th>status_pengerjaan</th>
                                            <th>command</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>no</th>
                                            <th>tanggal_mulai</th>
                                            <th>tanggal_selesai</th>
                                            <th>Nama</th>
                                            <th>no_telepon</th>
                                            <th>Lokasi</th>
                                            <th>problem</th>
                                            <th>lampiran</th> 
                                            <th>ticket</th>
                                            <th>PIC</th>
                                            <th>status_ticket</th>
                                            <th>status_pengerjaan</th>
                                            <th>command</th>
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
	    		<td><?=$data['tanggal_start']?></td>
                <td><?=$data['tanggal_end']?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['no_Telepon']?></td>
	    		<td><?=$data['lokasi']?></td>
                <td><?=$data['problem']?></td>
                <td> <?=$data['lampiran']?></td>
                <td><?=$data['ticket']?></td>
                <td><?=$data['PIC']?></td>
                <td><?=$data['status_ticket']?></td>
                <td><?=$data['status']?></td>
	    		<td>
	    			<a href="datatabel.php?hal=edit&ID=<?=$data['ID']?>" class="btn btn-warning"> Edit </a>
	    			
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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