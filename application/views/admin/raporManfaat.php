<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="bg-info text-light">
                                <tr>
                                    <th>No</th>
                                    <th>Sumber Dana</th>
                                    <th>Kategori</th>
                                    <th>Asnaf</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Alamat</th>
                                    <th>No Tlp</th>
                                    <!-- <th>Bantuan</th> -->
                                    <th style="width: 6%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($manfaat as $m) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Laz<br>
                                            <p><small class="text-info"><?= $m['sumber'] ?></small></p>
                                        </td>
                                        <td><?= $m['kategori'] ?></td>
                                        <td> <?= $m['asnaf'] ?></td>
                                        <td>
                                            <?php if ($m['m_nik_lembaga'] != NULL) { ?>
                                                <?= $m['nama_lembaga'] ?><br>
                                                <p><small class="text-info"><?= $m['nama_manfaat'] ?></small></p>

                                            <?php } else { ?>
                                                <?= $m['nama_manfaat'] ?>

                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($m['nik'] != NULL) {
                                                echo $m['nik'];
                                            } elseif ($m['m_nik_keluarga'] != NULL) {
                                                echo $m['m_nik_keluarga'];
                                            } elseif ($m['m_nik_lembaga'] != NULL) {
                                                echo $m['m_nik_lembaga'];
                                            } ?>
                                        </td>

                                        <td> <?= $m['kota'] ?></td>
                                        <td> <?= $m['kec'] ?></td>
                                        <td> <?= $m['alamat'] ?></td>
                                        <td> <?= $m['hp'] ?></td>
                                        <!-- <td>Bantuan</td> -->
                                        <td>
                                            <a class="btn btn-outline-info btn-xs " data-toggle="modal" data-target="#detailManfaat<?= $m['id_manfaat'] ?>"><i class="fas fa-search"></i></a>
                                            <!-- <a class="btn btn-outline-secondary btn-xs"><i class="fas fa-edit"></i></a> -->
                                            <a class="btn btn-outline-danger btn-xs" href="<?php echo base_url() . 'manfaatadmin/hapus_manfaat/' . $m['id_manfaat'] ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- Modal View -->

<?php foreach ($manfaat as $ma) { ?>
    <div class="modal fade" id="detailManfaat<?= $ma['id_manfaat'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-light">
                    <h5 class="modal-title" id="ModalLabel">Detail Distribusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-8 d-flex">

                            <img src="https://static.remove.bg/remove-bg-web/913b22608288cd03cc357799d0d4594e2d1c6b41/assets/start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg" alt="" width="100%" height="100%" class="rounded-lg d-flex justify-content-center align-items-center">
                        </div>
                        <div class="col-4">

                            <div class="mx-2">
                                <?php if ($ma['m_nik_lembaga'] != NULL) { ?>
                                    <h6 class="text-info"><?= $ma['kategori'] ?><span class="mx-1"></span><mark class="bg-info"><?= $ma['nama_lembaga'] ?></mark></h6>

                                <?php } else { ?>
                                    <h6 class="text-info"><?= $ma['kategori'] ?></h6>
                                <?php } ?>
                                <h4><b><?= $ma['nama_manfaat'] ?></b></h4>
                                <h6 class="font-italic">
                                    <?php
                                    if ($ma['nik'] != NULL) {
                                        echo $ma['nik'];
                                    } elseif ($ma['m_nik_keluarga'] != NULL) {
                                        echo $ma['m_nik_keluarga'];
                                    } elseif ($ma['m_nik_lembaga'] != NULL) {
                                        echo $ma['m_nik_lembaga'];
                                    } ?>
                                </h6>
                                <hr class="bg-info">



                                <h6><b>Alamat</b></h6>
                                <h6 class="font-weight-light"><?= $ma['alamat'] ?></h6>


                                <h6><b>Desa</b></h6>
                                <h6 class="font-weight-light"><?= $ma['desa'] ?></h6>

                                <h6><b>Kesamatan</b></h6>
                                <h6 class="font-weight-light"><?= $ma['kec'] ?></h6>

                                <h6><b>Kabupaten/Kota</b></h6>
                                <h6 class="font-weight-light"><?= $ma['kota'] ?></h6>

                                <h6><b>Provinsi</b></h6>
                                <h6 class="font-weight-light"><?= $ma['prov'] ?></h6>

                                <h6><b>No HP</b></h6>
                                <h6 class="font-weight-light"><?= $ma['hp'] ?></h6>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-info text-light">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Tutup Modal View -->