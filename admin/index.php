<?php 
    header("Refresh: 300");
    session_start();
    if(!isset($_SESSION["id"])) {
        header("location:login.php");
    }
    include ("koneksi.php");
   

    $sql="select count(status_ticket) as open from complaint WHERE (status_ticket='open') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result=mysqli_query($connection,$sql);
    $data=mysqli_fetch_assoc($result);

    $sql1="select count(ticket) as ticket from complaint WHERE YEAR (tanggal_start) = YEAR (CURDATE())";
    $result1=mysqli_query($connection,$sql1);
    $data1=mysqli_fetch_assoc($result1);

    $sql2="select count(status_ticket) as 'On Progress' from complaint WHERE (status_ticket='On Progress' OR status_ticket='Hold') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result2=mysqli_query($connection,$sql2);
    $data2=mysqli_fetch_assoc($result2);

    $sql3="select count(status_ticket) as closed from complaint WHERE (status_ticket='closed') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result3=mysqli_query($connection,$sql3);
    $data3=mysqli_fetch_assoc($result3);

    $sql4="select count(status) as open_peminjaman from peminjaman WHERE (status='Open') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result30=mysqli_query($connection,$sql4);
    $data30=mysqli_fetch_assoc($result30);

    $sql5="select count(status) as open_event from event WHERE (status='Open') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result31=mysqli_query($connection,$sql5);
    $data31=mysqli_fetch_assoc($result31);

    $completed="select count(status) as completed from complaint WHERE (status='Completed') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result4=mysqli_query($connection,$completed);
    $data4=mysqli_fetch_assoc($result4);

    $overdue="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = MONTH (CURDATE()) AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result5=mysqli_query($connection,$overdue);
    $data5=mysqli_fetch_assoc($result5);


    $chart1="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 1 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result6=mysqli_query($connection,$chart1);
    $data6=mysqli_fetch_assoc($result6);

    $chart2="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 2 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result7=mysqli_query($connection,$chart2);
    $data7=mysqli_fetch_assoc($result7);

    $chart3="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 3 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result8=mysqli_query($connection,$chart3);
    $data8=mysqli_fetch_assoc($result8);
    
    $chart4="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 4 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result9=mysqli_query($connection,$chart4);
    $data9=mysqli_fetch_assoc($result9);

    $chart5="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 5 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result10=mysqli_query($connection,$chart5);
    $data10=mysqli_fetch_assoc($result10);

    $chart6="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 6 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result11=mysqli_query($connection,$chart6);
    $data11=mysqli_fetch_assoc($result11);

    $chart7="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 7 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result12=mysqli_query($connection,$chart7);
    $data12=mysqli_fetch_assoc($result12);

    $chart8="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 8 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result13=mysqli_query($connection,$chart8);
    $data13=mysqli_fetch_assoc($result13);

    $chart9="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 9 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result14=mysqli_query($connection,$chart9);
    $data14=mysqli_fetch_assoc($result14);

    $chart10="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 10 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result15=mysqli_query($connection,$chart10);
    $data15=mysqli_fetch_assoc($result15);

    $chart11="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 11 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result16=mysqli_query($connection,$chart11);
    $data16=mysqli_fetch_assoc($result16);

    $chart12="select count(status) as overdue from complaint WHERE (status='Overdue') AND MONTH (tanggal_start) = 12 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result17=mysqli_query($connection,$chart12);
    $data17=mysqli_fetch_assoc($result17);


    $chart13="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 1 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result18=mysqli_query($connection,$chart13);
    $data18=mysqli_fetch_assoc($result18);

    $chart14="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 2 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result19=mysqli_query($connection,$chart14);
    $data19=mysqli_fetch_assoc($result19);

    $chart15="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 3 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result20=mysqli_query($connection,$chart15);
    $data20=mysqli_fetch_assoc($result20);
    
    $chart16="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 4 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result21=mysqli_query($connection,$chart16);
    $data21=mysqli_fetch_assoc($result21);

    $chart17="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 5 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result22=mysqli_query($connection,$chart17);
    $data22=mysqli_fetch_assoc($result22);

    $chart18="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 6 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result23=mysqli_query($connection,$chart18);
    $data23=mysqli_fetch_assoc($result23);

    $chart19="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 7 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result24=mysqli_query($connection,$chart19);
    $data24=mysqli_fetch_assoc($result24);

    $chart20="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 8 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result25=mysqli_query($connection,$chart20);
    $data25=mysqli_fetch_assoc($result25);

    $chart21="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 9 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result26=mysqli_query($connection,$chart21);
    $data26=mysqli_fetch_assoc($result26);

    $chart22="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 10 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result27=mysqli_query($connection,$chart22);
    $data27=mysqli_fetch_assoc($result27);

    $chart23="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 11 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result28=mysqli_query($connection,$chart23);
    $data28=mysqli_fetch_assoc($result28);

    $chart24="select count(ticket) as ticket from complaint WHERE MONTH (tanggal_start) = 12 AND YEAR (tanggal_start) = YEAR (CURDATE())";
    $result29=mysqli_query($connection,$chart24);
    $data29=mysqli_fetch_assoc($result29);
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
    <title>Dashboard</title>

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
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" >
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
                    <span>Artikel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables_event.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Event</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tables_peminjaman.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Peminjaman</span>
                </a>
            </li>

            <div class="sidebar-heading">
                Administrator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="pic.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>PIC</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="reminder.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reminder</span>
                </a>
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

                    <nav class="navbar navbar-light bg-light">
                            <a class="navbar-brand" href="../index.php">Back To User Page</a>
                    </nav>

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
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <?php
                                        if (isset($_SESSION["id"])) {              
                                            echo 
                                                '<a href="logout.php" class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout </a>';
                                        }
                                        else {
                                            echo    
                                                '<a href="login.php" class="dropdown-item"  >
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Login </a>';
                                        }
                                    ?>
                                </div>
                            </li>
                        </div>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a target="_blank"href="data.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background-color:#0090D1"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables_open.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Open Ticket </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data['open'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables_on_progress.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> On Progress Ticket</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data2['On Progress'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables_close.php">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Closed Ticket </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data3['closed'];?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables.php">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Tiket</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data1['ticket'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables_peminjaman.php">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Ticket Peminjaman</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data30['open_peminjaman'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "tables_event.php">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Ticket Event</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data31['open_event'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Tiket</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="layanan" ></canvas> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status Tiket</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart pt-2 pb-1">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <script>
                                        var myChart = document.getElementById('myChart').getContext('2d');

                                        // Global Options
                                        Chart.defaults.global.defaultFontFamily = 'Lato';
                                        Chart.defaults.global.defaultFontSize = 12;
                                        Chart.defaults.global.defaultFontColor = '#777';

                                        var massPopChart = new Chart(myChart, {
                                            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
                                            data:{
                                                labels:['Tepat Waktu : <?php echo $data4['completed'];?>', 'On Progress: <?php echo $data2['On Progress'];?>', 'Telat: <?php echo $data5['overdue'];?>'],
                                                datasets:[{
                                                    label:'Population',
                                                    data:[
                                                        <?php echo $data4['completed'];?>,
                                                        <?php echo $data2['On Progress'];?>,
                                                        <?php echo $data5['overdue'];?>  
                                                    ],
                                                    //backgroundColor:'green',
                                                    backgroundColor:[
                                                        'rgba(255, 99, 132, 0.6)',
                                                        'rgba(54, 162, 235, 0.6)',
                                                        'rgba(255, 206, 86, 0.6)'
                                                    ],
                                                    borderWidth:1,
                                                    borderColor:'#777',
                                                    hoverBorderWidth:3,
                                                    hoverBorderColor:'#000'
                                                }]
                                            },
                                            options:{
                                                legend:{
                                                    display:true,
                                                    position:'right',
                                                    labels:{
                                                        fontColor:'#000'
                                                    }
                                                },
                                                layout:{
                                                    padding:{
                                                        left:0,
                                                        right:0,
                                                        bottom:0,
                                                        top:0
                                                    }
                                                },
                                                tooltips:{
                                                    
                                                }
                                            }
                                        });
                                    </script>
                                    <script>
                                        $(function () {/*from   w ww .  ja va2 s  . c o  m*/
                                            var ctx = document.getElementById("layanan").getContext('2d');
                                            Chart.defaults.global.defaultFontFamily = 'Lato';
                                            Chart.defaults.global.defaultFontSize = 12;
                                            Chart.defaults.global.defaultFontColor = '#777';

                                        var datafirst = {
                                            label: "Total Telat",
                                            data: [<?php echo $data6['overdue'];?>,
                                                    <?php echo $data7['overdue'];?>,
                                                    <?php echo $data8['overdue'];?>,
                                                    <?php echo $data9['overdue'];?>,
                                                    <?php echo $data10['overdue'];?>,
                                                    <?php echo $data11['overdue'];?>,
                                                    <?php echo $data12['overdue'];?>,
                                                    <?php echo $data13['overdue'];?>,
                                                    <?php echo $data14['overdue'];?>,
                                                    <?php echo $data15['overdue'];?>,
                                                    <?php echo $data16['overdue'];?>,
                                                    <?php echo $data17['overdue'];?>,
                                                ],
                                            backgroundColor: 'rgba(255, 99, 132, 0.6)'
                                        };
                                        var datasecond = {
                                            label: "Total Tiket semua",
                                            data: [<?php echo $data18['ticket'];?>,
                                                    <?php echo $data19['ticket'];?>,
                                                    <?php echo $data20['ticket'];?>,
                                                    <?php echo $data21['ticket'];?>,
                                                    <?php echo $data22['ticket'];?>,
                                                    <?php echo $data23['ticket'];?>,
                                                    <?php echo $data24['ticket'];?>,
                                                    <?php echo $data25['ticket'];?>,
                                                    <?php echo $data26['ticket'];?>,
                                                    <?php echo $data27['ticket'];?>,
                                                    <?php echo $data28['ticket'];?>,
                                                    <?php echo $data29['ticket'];?>
                                                ],
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)'
                                        };
                                        var data = {      
                                            labels: [
                                                'Januari',
                                                'Februari',
                                                'Maret',
                                                'April',
                                                'Mei',
                                                'Juni',
                                                'Juli',
                                                'Agustus',
                                                'September',
                                                'Oktober',
                                                'November',
                                                'Desember'
                                            ],
                                            datasets: [datafirst, datasecond]
                                        };
                                        var myDoughnutChart = new Chart(ctx, {
                                            type: 'line',
                                            data: data,
                                            options:{
                                                legend:{
                                                    display:true,
                                                    position:'right',
                                                    labels:{
                                                        fontColor:'#000'
                                                    }
                                                },
                                                layout:{
                                                    padding:{
                                                        left:0,
                                                        right:0,
                                                        bottom:80,
                                                        top:0
                                                    }
                                                },
                                                tooltips:{
                                                    enabled:true
                                                }
                                            }
                                            });
                                        });
                                    </script> 
                                    
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <?php
                                                if ($data5['overdue'] != '0'){
                                                    $dat = $data5["overdue"] /   ($data5["overdue"] + $data2["On Progress"] + $data4["completed"])    * 100 ."%";
                                                    echo '<b>Telat = </b>' . $dat;
                                                }
                                            ?>
                                        </span>
                                        <span class="mr-2">
                                            <?php
                                                if ($data2['On Progress'] != '0'){
                                                    $dat1 = $data2["On Progress"] /   ($data5["overdue"] + $data2["On Progress"]+ $data4["completed"])    * 100 ."%";
                                                    echo '<b>|  On Progress = </b>' . $dat1;
                                                }
                                            ?>
                                        </span>
                                        <span class="mr-2">
                                            <?php
                                                if ($data4['completed'] != '0'){
                                                    $dat2 = $data4["completed"]  /   ($data5["overdue"] + $data2["On Progress"] + $data4["completed"])    * 100 ."%";
                                                    echo '<b>|  Tepat Waktu = </b>' . $dat2;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <header>Reminder</header>
                        <div class="inputField">
                            <input type="text" placeholder="Add your new reminder">
                            <button><i class="fas fa-plus"></i></button>
                        </div>
                        <ul class="todoList">
                            <!-- data are comes from local storage -->
                        </ul>
                        <div class="footer">
                            <span>You have <span class="pendingTasks"></span> pending tasks</span>
                            <button>Clear All</button>
                        </div>
                    </div>
      
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
            <script src="js/script.js"></script>
</body>
</html>