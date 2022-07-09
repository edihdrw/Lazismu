<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LazisMu | Log in</title>

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
    <div class="row d-flex align-items-center">
        <div class="login-box col">


            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <div class="login-logo">
                        <!-- <a href="index2.html"><b>Lazis</b>MU</a> -->
                        <img style="width: 50%;" src="<?= base_url() ?>assets/img/Lazizmu.png" alt="">
                    </div>
                    <p class="login-box-msg"> <?= $this->session->flashdata('message'); ?></p>

                    <form action="<?= base_url(); ?>auth/reset" method="post">
                        <div class="input-group mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <small class="text-danger"><?= form_error('email'); ?></small>


                        <!-- /.col -->
                        <div>
                            <button type="submit" class="btn btn-outline-info btn-block">Reset Password</button>
                        </div>

                        <!-- /.col -->

                    </form>

                    <!-- /.social-auth-links -->
                    <div class="mt-3">

                        <p class="mb-0">
                            <a href="<?php echo base_url();  ?>auth" class="text-center text-info">Login</a>
                        </p>
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
    <script src="<?php echo base_url();  ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url();  ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url();  ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>