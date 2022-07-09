<!-- Main Footer -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AQUA TEAM</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>


<!-- Script -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>
<!-- Tutup Script -->



<!-- jQuery -->


<!-- ChartJS -->
<script src="<?php echo base_url();  ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>





<script type="text/javascript">
    $(function() {


        $("#kategori").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('manfaatadmin/ambil_data') ?>",
                    data: {
                        modul: 'kategori',
                        id: value
                    },
                    success: function(respond) {
                        $("#formjiwa").html(respond);

                    }

                })

            }

        });

    });
    $(function() {


    });
</script>

<!-- SELESAI -->


<script type="text/javascript">
    $(function() {

        // $.ajaxSetup({
        //     type: "POST",
        //     url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
        //     cache: false,
        // });

        $("#provinsi1").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        console.log(respond);
                        $("#kota1").html(respond);
                    }
                })
            }

        });


        $("#kota1").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan1").html(respond);
                    }
                })
            }
        });

        $("#kecamatan1").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'desa',
                        id: value
                    },
                    success: function(respond) {
                        $("#desa1").html(respond);
                    }
                })
            }
        });

    })
</script>

<script type="text/javascript">
    $(function() {

        // $.ajaxSetup({
        //     type: "POST",
        //     url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
        //     cache: false,
        // });

        $("#provinsi2").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        console.log(respond);
                        $("#kota2").html(respond);
                    }
                })
            }

        });


        $("#kota2").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan2").html(respond);
                    }
                })
            }
        });

        $("#kecamatan2").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'desa',
                        id: value
                    },
                    success: function(respond) {
                        $("#desa2").html(respond);
                    }
                })
            }
        });

    })
</script>


<script type="text/javascript">
    $(function() {

        // $.ajaxSetup({
        //     type: "POST",
        //     url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
        //     cache: false,
        // });

        $("#provinsi").change(function() {

            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kabupaten',
                        id: value
                    },
                    success: function(respond) {
                        console.log(respond);
                        $("#kota").html(respond);
                    }
                })
            }

        });


        $("#kota").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'kecamatan',
                        id: value
                    },
                    success: function(respond) {
                        $("#kecamatan").html(respond);
                    }
                })
            }
        });

        $("#kecamatan").change(function() {
            var value = $(this).val();
            if (value > 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('distribusiadmin/ambil_data') ?>",
                    cache: false,
                    data: {
                        modul: 'desa',
                        id: value
                    },
                    success: function(respond) {
                        $("#desa").html(respond);
                    }
                })
            }
        });

    })
</script>



<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });


    });

    $(function() {
        $("#distribusiTabel").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });


    });




    $(function() {
        $("#dAsnaf").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#dAsnaf_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $("#tahunAsnaf").change(function() {

            let value = $(this).val();


            $.ajax({
                type: "POST",
                url: "<?= base_url('distribusiadmin/load_asnaf') ?>",
                data: {
                    modul: value
                },


                success: function(response) {
                    $("#dAsnaf tbody").html(response)
                    // console.log(value)

                }
            })


        });


    });



    $(function() {
        $("#dProgram").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf"]
        }).buttons().container().appendTo('#dProgram_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $("#tahunProgram").change(function() {

            let value = $(this).val();


            $.ajax({
                type: "POST",
                url: "<?= base_url('distribusiadmin/load_program') ?>",
                data: {
                    modul: value
                },


                success: function(response) {
                    $("#dProgram tbody").html(response)

                    // console.log(value)

                }
            })



        });


    });
</script>


</body>

</html>