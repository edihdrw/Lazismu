<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->



        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= number_format($hitungSasaran->estimasi_orang, 0, ',', '.')  ?> </h3>

                        <p>Sasaran Program</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $hitungDis ?></h3>

                        <p>Kegiatan Distribusi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= number_format($hitungBantuan->total_penerima, 0, ',', '.');  ?></h3>

                        <p>Penerima Bantuan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><span class="mr-1">Rp</span><?= number_format($hitungSaluran->total_saluran, 0, ',', '.');  ?></h3>

                        <p>Total Penyaluran Dana</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Tabel -->

        <div class="row">
            <div class="col-8">
                <!-- STACKED BAR CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Distribusi berdasarkan Program</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style='width:10%;'></th>
                                    <?php

                                    foreach ($program as $prog) {
                                        echo "
                                         <th  style = 'width:10%;' >$prog[program]</th>";
                                    } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // foreach ($distribusi as $dis) {
                                // foreach ($program as $prog) {
                                // $p = $prog['program'];
                                foreach ($dana as $dana) {
                                    //     $d = $dana['dana'];
                                    // $sql = "SELECT * FROM tb_distribusi WHERE program=$p AND dana = $d";
                                    // $query = $this->db->query($sql);

                                    //     foreach ($query as $q) {
                                ?>


                                    <tr>
                                        <td class="text-sm"><?= $dana['dana'] ?></td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Dakwah") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Pendidikan") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td> <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Kesehatan") {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td> <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Ekonomi") {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td> <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Kemanusiaan/Sosial") {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td> <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($dana['dana'] == $dis['dana'] && $dis['program'] == "Lingkungan") {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    //     }
                                    // }
                                    // }
                                    // }
                                } ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-4">

                <!-- AREA CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Distribusi berdasarkan Sumber Dana</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Sumber Dana</th>
                                    <th style="width: 10px">Presentase</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                foreach ($dana1 as $dn) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dn['dana'] ?></td>
                                        <td>
                                            <?php

                                            $total_saluran = 0;


                                            foreach ($distribusi as $dis) {

                                                if ($dn['dana'] == $dis['dana']) {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }

                                            if ($total_dana == 0) {
                                                echo 0;
                                            } else {
                                                echo round((($total_saluran / $total_dana) * 100), 1);
                                            }
                                            ?>
                                            <span>%</span>
                                        </td>


                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                        <!-- /.card-body -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>

        </div>
        <div class="row">
            <div class="col-8">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Distribusi berdasarkan Asnaf</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th style="width: 10px;"></th>
                                    <?php
                                    foreach ($asnaf1 as $asnaf) {
                                        echo "
                                         <th>$asnaf[asnaf]</th>";
                                    } ?>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dana1 as $dn) {
                                ?>
                                    <tr>
                                        <td class="text-sm"><?= $dn['dana'] ?></td>
                                        <td> <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Miskin") {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Fakir") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Amil") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Mualaf") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Riqab") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Gharimin") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Sabilillah") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($dn['dana'] == $dis['dana'] && $dis['asnaf'] == "Ibnu Sabil") {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Realisasi Penyaluran Bantuan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Bulan</th>
                                    <th>Jumlah</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($bulan as $bln) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $bln['bulan'] ?></td>
                                        <td>
                                            <?php
                                            $total_saluran = 0;

                                            foreach ($distribusi as $dis) {


                                                if ($bln['no'] == $dis['bulan']) {

                                                    $totalProg = $dis['total_saluran'];
                                                    $total_saluran += $totalProg;
                                                }
                                            }
                                            ?>


                                            <span class="mr-1">Rp</span>

                                            <?php echo number_format($total_saluran, 0, ',', '.');


                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                } ?>
                            </tbody>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <!-- Tutup Tabel -->

    </div><!-- /.container-fluid -->
</section>





<!-- /.content-wrapper -->