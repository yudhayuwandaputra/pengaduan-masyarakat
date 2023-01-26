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
                                        <h2 class="h5 text-gray-900 mb-4">Silahkan Login Jika Ingin Melanjutkan!</h2>
                                    </div>
                                    <br>
                                    <?php if ($this->session->flashdata('error')) : ?>
                                        <?= $this->session->flashdata('error'); ?>
                                    <?php endif ?>
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-warning" role="alert">
                                            <center> <?php echo validation_errors(); ?></center>
                                        </div>
                                    <?php endif ?>
                                    <form class="user" method="post" action="<?= base_url(); ?>index.php/login">
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="float-right">
                                        <a href="<?= base_url() ?>home" class="btn btn-info">Kembali</a>
                                        <button type="submit" name="submit" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                    </form>
                                    <br>
                                    <br>    
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url(); ?>index.php/register">Create an Account!</a>
                                    </div>
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