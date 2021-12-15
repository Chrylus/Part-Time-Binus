<!DOCTYPE html>
<html lang = "en">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-35959721-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-35959721-1');
    </script>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Place this data between the <head> tags of your website -->
    <title>Laporan Pengaduan Masalah BINUS@Malang</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d7381b">
    <meta name="apple-mobile-web-app-title" content="LAPOR!">
    <meta name="application-name" content="LAPOR!">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="../Part-Time-Binus/user/images/Binus Logo.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- App Styles -->
    <link href= 'index.css' rel="stylesheet">

    <script src="https://www.lapor.go.id/themes/lapor/assets/sweetalert2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://www.lapor.go.id/plugins/responsiv/uploader/assets/css/uploader.css">
    <link rel="stylesheet" href="https://www.lapor.go.id/combine/66cb3800f16b20b046b93a4571b46c42-1617850351">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://www.lapor.go.id/combine/15d6ac0173665e1a9057c30ca8e08f8f-1617850351"></script>
    <script src="https://www.lapor.go.id/themes/lapor/assets/js/zingchart.min.js"></script>

    <link rel ="stylesheet" href = "//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <nav id="leftMenu" class="navmenu navmenu-default navmenu-inverse navmenu-fixed-left offcanvas" role="navigation">
        <ul class="nav navmenu-nav">
            <li role="presentation" class="  active">
                <a href="#" >
                    Layanan IT
                </a>
            </li>
            <li role="presentation" class="  ">
                <a href="#" >
                    Artikel
                </a>
            </li>
            <li role="presentation" class="  ">
                <a href="../admin/login.php" >
                    Admin
                </a>
            </li>
        </ul>
    </nav>
</head>

<body class="page-home pd-t-0 ">
    <div class="loader-custom hidden"></div>
    <div id="search-bar"> </div>

    <?php include "connect_database.php";?>

    <header class="navbar-fixed-top navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="offcanvas" data-target="#leftMenu" data-canvas="body">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="images/Binus Logo.png" alt="" class="img-responsive hidden-navbar-inverse">
                    <img src="images/Binus Logo.png" alt="" class="img-responsive hidden-navbar-default">
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left navbar-primary">
                    <li role="presentation" class="  ">
                        <a href="#" >
                            Layanan IT
                        </a>
                    </li>
                    <li role="presentation" class="  ">
                        <a href="#" >
                            Artikel
                        </a>
                    </li>
                    <li role="presentation" class="  ">
                        <a href="../admin/login.php" >
                            Admin
                        </a>
                    </li>
            </div>
        </div>
    </header>

    <section id="hero">
        <div class="container">
            <div class="block block-aspiration">
                <div class="h2">Layanan IT Operation Binus@Malang</div>
                <!-- <p>Sampaikan permintaan Anda langsung kepada unit kerja yang berwenang</p> -->
                <hr>
            </div>
        </div>
        <svg width="100%" height="160px" viewBox="0 0 1300 160" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
                <path d="M1300,160 L-5.68434189e-14,160 L-5.68434189e-14,119 C423.103102,41.8480501 1096.33049,180.773108 1300,98 L1300,160 Z" fill="#FEF5ED" fill-rule="nonzero"></path>
                <path d="M129.77395,40.2373685 C292.925845,31.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,40.8373289 1240.93447,40.8373289 C1262.89392,40.8373289 1282.20864,41.9705564 1299.18628,44.0144896 L1300,160 L-1.0658141e-14,160 L-1.0658141e-14,105 C31.4276111,70.4780448 73.5616946,43.3459311 129.77395,40.2373685 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3"></path>
                <path d="M69.77395,60.2373685 C232.925845,51.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,0.837328936 1240.93447,0.837328936 C1263.91283,0.837328936 1283.59768,0.606916225 1300,1 L1300,160 L-1.70530257e-13,160 L-9.9475983e-14,74 C-9.9475983e-14,74 36.9912359,62.0502671 69.77395,60.2373685 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3"></path>
                <path d="M2.27373675e-13,68 C23.2194389,95.7701288 69.7555676,123.009338 207,125 C507.7991,129.36294 698.336099,22 922,22 C1047.38026,22 1198.02057,63.2171658 1300,101 L1300,160 L0,160 L2.27373675e-13,68 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3" transform="translate(650, 91) scale(-1, 1) translate(-650, -91) "></path>
            </g>
        </svg>
    </section>

    <?php
        if(isset($_GET['Ticket'])){
        $Pesan=$_GET['Ticket'];
        echo    "<script type = 'text/javascript'>
                    Swal.fire(
                        'Ticket Berhasil Dibuat',
                        'Mohon Catat Nomor Ticket Anda : <b>$Pesan</b>',
                        'success'
                    )
                </script>";
        }
    ?>

    <section id="complaint-box">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-md-offset-2 mg-b-40">
            <form action="connect_class.php" method="POST" class="complaint-form">
            <div class="complaint-form-box">
                <h5><span style="color: #15FF00">&#9677</span> Tim IT yang bertugas saat ini : 
                    <?php
                        include ("connect_database.php");
                        $admin = "SELECT * FROM admin WHERE status = 'Online'";
                        $nama_admin = mysqli_query($connection, $admin);
                        if (mysqli_num_rows($nama_admin) > 0) {
                            while ($row = mysqli_fetch_array($nama_admin)) {
                                echo $row['nama'];
                                echo " | ";
                            }
                        }
                    ?>
                </h5> 
            <br>
                <div class="select-complaint"><center>Pilih Kategori Layanan</center></div>
                <!-- <center><p><b>Pilih Klasifikasi Permintaan Anda</b></p></center> -->
                <center>
                    <a href="../index.php" class="button1">Helpdesk</a>
                    <a href="#" class="button1 active">Kelas</a>
                    <a href="event.php" class="button1">Event</a>
                    <a href="peminjaman.php" class="button1">Peminjaman</a>
                    <a href="search_ticket.php" class="button1">Cek Status Ticket</a>
                </center>
                <br>
                <p>Sampaikan keluhan anda terkait permasalahan IT di kelas dengan mengisi form berikut</p>
                <br>
            </div>
            <div class="complaint-form-category">
                <input list="text" name="lt_ruangan" class="form-control" placeholder="Lantai Ruangan *" required>
                <datalist id="text">
                    <option value="Lantai 1">
                    <option value="Lantai 2">
                    <option value="Lantai 3">
                    <option value="Lantai 4">
            </div>
            <div class="complaint-form-category">
                <input type="text" name="no_ruangan" class="form-control" placeholder="Nomor Ruangan *" required></textarea>
            </div>
            <div class="complaint-form-category">
                <textarea name="problem" id="" rows="6" class="form-control textarea-flex autosize" placeholder="Ketik Masalah Anda *" required></textarea>
            </div>
            <div class="complaint-form-footer">
                <div class="row-flex flex-align-between">
                    <input class="btn btn-primary" id="submit-complaint" type="submit" value="CREATE TICKET" name="submit" data-target="#data_submit">
                </div>
            </div>
        </form>
    </section>

    <!-- Navbar -->
    <script src="https://www.lapor.go.id/combine/412ecc180b60d48eb196db8827c68391-1634533910"></script>
    <script src= "../admin/js/demo/datatables-demo.js"> </script>
</body>

</html>