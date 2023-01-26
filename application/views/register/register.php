<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengaduan Masyarakat</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>public/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>public/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Registrasi Terlebih Dahulu!</h1>
                                    </div>
                                    <br>
                                    <form class="user" method="post" action="<?= base_url(); ?>register/tambah_user">

                                        <div class="form-group">
                                            <input type="number" name="nik" class="form-control form-control-user"  placeholder="Nomor Induk Kependudukan...">
                                        </div>
                                        <div class="form-group">
                                            <input type="username" name="nama" class="form-control form-control-user"  placeholder="Nama...">
                                        </div>
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user"   placeholder="Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="telp" class="form-control form-control-user"  placeholder="No Telepon...">
                                        </div>

                                      
                                       <br>
                                       <div class="float-right">
                                        <a href="<?= base_url() ?>home" class="btn btn-info">Kembali</a>
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Registrasi
                                        </button>
                                       </div>
                                    </form>
                                <br>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>js/sb-admin-2.min.js"></script>

</body>

</html>