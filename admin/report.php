<?php 
header("Refresh: 300");
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:login.php");
    }

    include ("koneksi.php");

    if(isset($_POST['hal']))
	{
		//Pengujian Apakah data akan diedit atau disimpan baru
		if($_GET['hal'] == "All")
		{
            $setSql = "SELECT * FROM `complaint` where ID = '$_GET[ID]'";  
            $setRec = mysqli_query($connection, $setSql); 
            $data = mysqli_fetch_array($setRec);
            if($data){
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <title>Reminder</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> 
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="icon" href="../user/images/Binus Logo.png">
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
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Interface
            </div> -->

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
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Report</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            
           
                <!-- <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a> -->


                    
            </li>

            <!-- Divider -->
          

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
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <!-- <div class="dropdown-divider"></div> -->
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
                    <h1 class="h3 mb-0 text-gray-800">Report</h1>
                    <br>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"  style="background-color:#0090D1">
                    <i class="fas fa-download fa-sm text-white-50"></i> Laporan Complain
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a target="_blank"href="data.php" class=" dropdown-item btn btn-sm btn-primary"> All</a>
                    <a target="_blank"href="data.php?bulan=1" class=" dropdown-item btn btn-sm btn-primary" > Januari</a>
                    <a target="_blank"href="data.php?bulan=2" class=" dropdown-item btn btn-sm btn-primary" > Februari</a>
                    <a target="_blank"href="data.php?bulan=3" class=" dropdown-item btn btn-sm btn-primary" > Maret</a>
                    <a target="_blank"href="data.php?bulan=4" class=" dropdown-item btn btn-sm btn-primary" > April</a>
                    <a target="_blank"href="data.php?bulan=5" class=" dropdown-item btn btn-sm btn-primary" > Mei</a>
                    <a target="_blank"href="data.php?bulan=6" class=" dropdown-item btn btn-sm btn-primary" > Juni</a>
                    <a target="_blank"href="data.php?bulan=7" class=" dropdown-item btn btn-sm btn-primary" > Juli</a>
                    <a target="_blank"href="data.php?bulan=8" class=" dropdown-item btn btn-sm btn-primary" > Agustus</a>
                    <a target="_blank"href="data.php?bulan=9" class=" dropdown-item btn btn-sm btn-primary" > September</a>
                    <a target="_blank"href="data.php?bulan=10" class=" dropdown-item btn btn-sm btn-primary" > Oktober</a>
                    <a target="_blank"href="data.php?bulan=11" class=" dropdown-item btn btn-sm btn-primary" > November</a>
                    <a target="_blank"href="data.php?bulan=12" class=" dropdown-item btn btn-sm btn-primary" > Desember</a>   
                    
                    </div>
                    
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"  style="background-color:#0090D1">
                    <i class="fas fa-download fa-sm text-white-50"></i> Laporan Peminjaman
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a target="_blank"href="data2.php" class=" dropdown-item btn btn-sm btn-primary"> All</a>
                    <a target="_blank"href="data2.php?bulan=1" class=" dropdown-item btn btn-sm btn-primary" > Januari</a>
                    <a target="_blank"href="data2.php?bulan=2" class=" dropdown-item btn btn-sm btn-primary" > Februari</a>
                    <a target="_blank"href="data2.php?bulan=3" class=" dropdown-item btn btn-sm btn-primary" > Maret</a>
                    <a target="_blank"href="data2.php?bulan=4" class=" dropdown-item btn btn-sm btn-primary" > April</a>
                    <a target="_blank"href="data2.php?bulan=5" class=" dropdown-item btn btn-sm btn-primary" > Mei</a>
                    <a target="_blank"href="data2.php?bulan=6" class=" dropdown-item btn btn-sm btn-primary" > Juni</a>
                    <a target="_blank"href="data2.php?bulan=7" class=" dropdown-item btn btn-sm btn-primary" > Juli</a>
                    <a target="_blank"href="data2.php?bulan=8" class=" dropdown-item btn btn-sm btn-primary" > Agustus</a>
                    <a target="_blank"href="data2.php?bulan=9" class=" dropdown-item btn btn-sm btn-primary" > September</a>
                    <a target="_blank"href="data2.php?bulan=10" class=" dropdown-item btn btn-sm btn-primary" > Oktober</a>
                    <a target="_blank"href="data2.php?bulan=11" class=" dropdown-item btn btn-sm btn-primary" > November</a>
                    <a target="_blank"href="data2.php?bulan=12" class=" dropdown-item btn btn-sm btn-primary" > Desember</a>     
                    
                    </div>
                    
                </div>
                
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"  style="background-color:#0090D1">
                    <i class="fas fa-download fa-sm text-white-50"></i> Laporan Event
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a target="_blank"href="data3.php" class=" dropdown-item btn btn-sm btn-primary"> All</a>
                    <a target="_blank"href="data3.php?bulan=1" class=" dropdown-item btn btn-sm btn-primary" > Januari</a>
                    <a target="_blank"href="data3.php?bulan=2" class=" dropdown-item btn btn-sm btn-primary" > Februari</a>
                    <a target="_blank"href="data3.php?bulan=3" class=" dropdown-item btn btn-sm btn-primary" > Maret</a>
                    <a target="_blank"href="data3.php?bulan=4" class=" dropdown-item btn btn-sm btn-primary" > April</a>
                    <a target="_blank"href="data3.php?bulan=5" class=" dropdown-item btn btn-sm btn-primary" > Mei</a>
                    <a target="_blank"href="data3.php?bulan=6" class=" dropdown-item btn btn-sm btn-primary" > Juni</a>
                    <a target="_blank"href="data3.php?bulan=7" class=" dropdown-item btn btn-sm btn-primary" > Juli</a>
                    <a target="_blank"href="data3.php?bulan=8" class=" dropdown-item btn btn-sm btn-primary" > Agustus</a>
                    <a target="_blank"href="data3.php?bulan=9" class=" dropdown-item btn btn-sm btn-primary" > September</a>
                    <a target="_blank"href="data3.php?bulan=10" class=" dropdown-item btn btn-sm btn-primary" > Oktober</a>
                    <a target="_blank"href="data3.php?bulan=11" class=" dropdown-item btn btn-sm btn-primary" > November</a>
                    <a target="_blank"href="data3.php?bulan=12" class=" dropdown-item btn btn-sm btn-primary" > Desember</a>   
                    
                    </div>
                    
                </div>
                
                
                
            </div>  
                </div>
    <!-- End of Page Wrapper -->
    

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
    <script src="js/script.js"></script>
</body>

</html>