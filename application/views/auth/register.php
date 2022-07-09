<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LazisMU | Daftar</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page ">
    <div class="row">
        <div class="card">
            <div class=" card-body login-card-body mt-3">
                <div class="login-box col">
                    <div class="login-logo">
                        <img style="width: 50%;" src="<?= base_url() ?>assets/img/Lazizmu.png" alt="">
                    </div>
                    <!-- /.login-logo -->


                    <form action="<?= base_url(); ?>auth/register" method="post">
                        <div class="input-group mb-3">
                            <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>

                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('nama'); ?></small>
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('email'); ?></small>

                        <div class="input-group mb-3">
                            <input name="password1" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('password1'); ?></small>

                        <div class="input-group mb-3">
                            <input name="password2" type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>


                        <!-- /.col -->
                        <div>
                            <button type="submit" class="btn btn-info btn-block">Daftar</button>
                        </div>

                        <!-- /.col -->

                    </form>

                    <!-- /.social-auth-links -->
                    <div class="mt-3 d-flex">
                        <div>
                            <p class="m-1">
                                <a href="<?php echo base_url();  ?>auth/reset" class="text-info">Lupa password</a>
                            </p>
                        </div>
                        |
                        <div>
                            <p class="m-1">
                                <a href="<?php echo base_url();  ?>" class="text-center">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <div class="login-box col">
            <img src="<?php echo base_url();  ?>assets/dist/img/laz_login2.png" style="height: 400px;" class="m-5" alt="">
        </div>

    </div>


    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();  ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();  ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>