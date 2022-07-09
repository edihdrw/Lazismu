<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="col">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Alamat</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($distribusi as $dis) {


                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td> <?= $dis['desa'] . ',' . $dis['kec'] . ',' . $dis['kota'] . ',' . $dis['prov'] ?></td>
                                    <td>
                                        <a class="btn btn-outline-info btn-xs " data-toggle="modal" data-target="#viewPeta<?= $dis['id_dis'] ?>"><i class="fas fa-search"></i><span class="ml-1">Detail</span></a>


                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<?php foreach ($distribusi as $dis) { ?>


    <div class="modal fade" id="viewPeta<?= $dis['id_dis'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-light">
                    <h5 class="modal-title" id="ModalLabel"><i class="nav-icon fas fa-map-marker-alt"></i> <span class="ml-1"> <?= $dis['desa'] . ',' . $dis['kec'] . ',' . $dis['kota'] . ',' . $dis['prov'] ?> </span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-2">


                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="distribusiTabel" class="table table-bordered table-hover">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Kegiatan</th>
                                        <th>Kategori</th>
                                        <th>Dana</th>
                                        <th>Tanggal</th>
                                        <th>Bentuk Bantuan</th>
                                        <th>Total Saluran</th>
                                        <th>Penerima</th>
                                        <th>Fota</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($distribusi1 as $dis1) {
                                        if ($dis1['desa'] == $dis['desa']) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $dis1['kegiatan']; ?></td>
                                                <td><?= $dis1['program']; ?></td>
                                                <td><?= $dis1['dana']; ?></td>
                                                <td><?= $dis1['tanggal']; ?></td>

                                                <td><?= $dis1['bentuk_bantuan']; ?></td>
                                                <td>
                                                    <span class="mr-1">Rp</span>

                                                    <?= number_format($dis1['total_saluran'], 2, ',', '.');  ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-info btn-sm h6"> <b><?= $dis1['total_penerima']; ?></b><span class="ml-1">Penerima</span></a>
                                                </td>
                                                <td>foto</td>



                                        <?php }
                                    } ?>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php

} ?>