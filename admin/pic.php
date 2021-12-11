<?php 
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:login.php");
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>SB Admin 2 - Sort Table</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Table sort -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
                        if (isset($_SESSION["id"])) {              
                            echo($_SESSION['nama']);
                        }

                        $connection = mysqli_connect('localhost', 'root', '', 'form_it');
                        if(!$connection) {
                            die("Database connection failed");
                        }

                        //Pengujian Apakah data absensi
                        if(isset($_GET['hal']))
                        {
                            if($_GET['hal'] == "status")
                            {
                                //Data akan di edit
                                $status = mysqli_query($connection,   "UPDATE admin SET status = CASE WHEN status = 'Online' THEN 'Offline' ELSE 'Online' END WHERE id = '$_GET[id]'", );
                                if($status) //jika edit sukses
                                {
                                    echo "<script>
                                            alert('Absensi Sukses!');
                                        </script>";
                                }
                                else
                                {
                                    echo "<script>
                                            alert('Absensi Gagal!!');
                                        </script>";
                                }
                            }
                            else if($_GET['hal'] == "edit")
                            {
                                //Tampilkan Data yang akan diedit
                                $tampil = mysqli_query($connection, "SELECT * FROM admin WHERE id = '$_GET[id]' ");
                                $data = mysqli_fetch_array($tampil);
                                if($data)
                                {
                                    //Jika data ditemukan, maka data ditampung ke dalam variabel
                                    $txtNama = $data['nama'];
                                    $txtEmail = $data['email'];
                                    $txtPassword = $data['password'];
                                }
                            }
                            else if ($_GET['hal'] == "hapus")
                            {
                                //Persiapan hapus data
                                $hapus = mysqli_query($connection, "DELETE FROM admin WHERE id = '$_GET[id]' ");
                                if($hapus){
                                    echo "<script>
                                            alert('Hapus Data Sukses!!');
                                            document.location='pic.php';
                                        </script>";
                                }
                            }
                        }

                        if(isset($_POST['bsimpan']))
                        {
                            //Pengujian Apakah data akan diedit atau disimpan baru
                            if($_GET['hal'] == "edit")
                            {
                                //Data akan di edit
                                $edit = mysqli_query($connection, "UPDATE admin set
                                                                    nama = '$_POST[nama]',
                                                                    email = '$_POST[email]',
                                                                    password = '$_POST[password]'
                                                                WHERE id = '$_GET[id]'
                                                            ");
                                if($edit) //jika edit sukses
                                {
                                    echo "<script>
                                            alert('Edit data Sukses!');
                                            document.location='pic.php';
                                        </script>";
                                }
                                else
                                {
                                    echo "<script>
                                            alert('Edit data GAGAL!!');
                                            document.location='pic.php';
                                        </script>";
                                }
                            }
                            else
                            {
                                //Data akan disimpan Baru
                                $simpan = mysqli_query($connection, "INSERT INTO admin (nama, email, password, status)
                                                            VALUES ('$_POST[nama]', 
                                                                    '$_POST[email]', 
                                                                    '$_POST[password]', 
                                                                    'Offline'
                                                                    )
                                                            ");
                                if($simpan) //jika simpan sukses
                                {
                                    echo "<script>
                                            alert('Simpan data Sukses!');
                                            document.location='pic.php';
                                        </script>";
                                }
                                else
                                {
                                    echo "<script>
                                            alert('Simpan data GAGAL!!');
                                            document.location='pic.php';
                                        </script>";
                                }
                            }
                        }
                    ?>                                
                </div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Ticket</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ticket:</h6>
                        <a class="collapse-item" href="tables.php">All</a>
                        <a class="collapse-item" href="tables_open.php">Open</a>
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
                <a class="nav-link" href="#">
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

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>PIC</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reminder</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>
                    </div>
                    <div class="card-body">
                    <form method="post" action="">
                        <div class="complaint-form-category">
                            <input type="text" name="nama" class="form-control" placeholder="Nama *" value="<?=@$txtNama?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="text" name="email" class="form-control" placeholder="Email *" value="<?=@$txtEmail?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="text" name="password" class="form-control" placeholder="Password   *" value="<?=@$txtPassword?>" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                    </form>
                    <br><br>
                    
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Admin Data</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Command</th>
                                                </tr>
                                            </thead>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Command</th>
                                                </tr>
                                            </tfoot> -->
                                            <tbody>
                                            <?php
                                                $no = 1;
                                                $tampil = mysqli_query($connection, "SELECT * from admin order by id desc");
                                                while($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=$data['nama']?></td>
                                                <td><?=$data['email']?></td>
                                                <td><?=$data['status']?></td>
                                                <td>
                                                    <a href="pic.php?hal=status&id=<?=$data['id']?>" class="btn btn-success">Ubah Status</a>
                                                    <a href="pic.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
                                                    <a href="pic.php?hal=hapus&id=<?=$data['id']?>" class="btn btn-danger"> Hapus </a>
                                                </td>
                                                <td>
                                                    
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
                    
                    <!-- Content Row -->
                    <div class="row">

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>