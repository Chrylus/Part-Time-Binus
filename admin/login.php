<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="../user/images/Binus Logo.png">
</head>

<body class="bg-gradient" style="background-color: #0090D1;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="display: flex!important; align-items:center; justify-content:center;">
                            <img src="https://1.bp.blogspot.com/-ubZ9dGTHkeo/YJEZqDJbLII/AAAAAAAAE5s/KnA48vbj4ykbbdNVIHBbLbLWxf2NIrn_QCLcBGAsYHQ/w1200-h630-p-k-no-nu/Logo%2BBinus%2BUniversity.png" alt="" style="width:100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?php 
        if(isset($_GET['pesan']))
            {
            if($_GET['pesan'] == "gagal")
            {
                echo "<div class='alert alert-danger'>Gagal Login karena Username atau Password Salah</div>";
            }
            else if($_GET['pesan'] == "logout")
            {
                echo "<div class='alert alert-success'>Anda Berhasil Logout dari Sistem</div>";
            }else if($_GET['pesan'] == "belum_login")
            {
                echo "<div class='alert alert-warning'>Anda Belum Melakukan Login ke dalam Sistem</div>";
            }
        }
        ?>
                                    <form class="user" method="post" action="proses.php">
                                        <div class="form-group">
                                            <input name="email"type="text" class="form-control form-control-user"style="height:calc(1.5em + .75rem + 2px);"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."required >
                                        </div>
                                        <div class="form-group">
                                            <input name="password"type="password" class="form-control form-control-user"style="height:calc(1.5em + .75rem + 2px);"
                                                id="exampleInputPassword" placeholder="Password"required >
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark btn-user btn-block" style="background-color: #0090D1;">
                                            Login
                                        </button>
                                        
                                        
                                    </form>
                                   
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>