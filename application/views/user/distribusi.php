<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Provinsi</div>
                            </div>

                            <select class=" form-control form-control" name='provinsi' id="provinsi">
                                <option value='0'>--Pilih Provinsi--</option>

                                <?php
                                foreach ($provinsi as $prov) {
                                    echo "<option value='$prov[id_prov]'>$prov[prov]</option>";
                                }
                                ?>

                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Kab</div>
                            </div>

                            <select class=" form-control form-control" id="kota">

                                <option value='0'>--Pilih Kabupaten/Kota--</pilih>

                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text style=" style="width: 80px;">Kec</div>
                            </div>

                            <select class=" form-control form-control" id="kecamatan">

                                <option value='0'>--Pilih Kecamatan--</pilih>
                            </select>


                        </div>

                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="input-group input-group-sm d-flex">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Filter</div>
                            </div>

                            <input type="text" name="" id="" class="form-control" placeholder="Masukan kata kunci">

                        </div>

                    </div> -->
                </div>
                <div class="row my-2">
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Laz</div>
                            </div>

                            <select class="form-control form-control" name="laz">

                                <option value="Lazismu DIY">Lazismu DIY</option>

                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Asnaf</div>
                            </div>

                            <select class="form-control form-control" name="asnaf">
                                <option value='0'>Semua</pilih>
                                    <?php
                                    foreach ($asnaf1 as $asnaf) {
                                        echo "<option value='$asnaf[id]'>$asnaf[asnaf]</option>";
                                    }
                                    ?>
                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Kategori</div>
                            </div>

                            <select class="form-control " name="kategori">
                                <option value='0'>Semua</pilih>
                                    <?php
                                    foreach ($kategori as $kategori) {
                                        echo "<option value='$kategori[id]'>$kategori[kategori]</option>";
                                    }
                                    ?>
                            </select>


                        </div>

                    </div>
                    <!-- <div class="col-sm-3">
                        <a href="" class="btn btn-success btn-sm btn-block"><i class="fas fa-search"></i> <span class="ml-1">Cari</span></a>
                    </div> -->

                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p class="login-box-msg"> <?= $this->session->flashdata('message'); ?></p>


                <a href="" class="btn btn-outline-primary  mb-2" data-toggle="modal" data-target="#tambahDistribusi"> <i class="fas fa-plus-circle"></i> <span class="ml-1">Tambah</span> </a>



                <table id="distribusiTabel" class="table table-bordered table-hover">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Kegiatan</th>
                            <th>Kategori</th>
                            <th>Dana</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Bentuk Bantuan</th>
                            <th style="width: 10%;">Total Saluran</th>
                            <th>Penerima</th>
                            <!-- <th>Fota</th> -->
                            <th style="width: 8%;">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($distribusi as $dis) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $dis['kegiatan']; ?></td>
                                <td><?= $dis['program']; ?></td>
                                <td><?= $dis['dana']; ?></td>
                                <td><?= $dis['tanggal']; ?></td>
                                <td>
                                    <?= $dis['desa'] . ',' . $dis['kec'] . ',' . $dis['kota'] . ',' . $dis['prov'] ?>
                                </td>
                                <td><?= $dis['bentuk_bantuan']; ?></td>
                                <td>
                                    <span class="mr-1">Rp</span>

                                    <?= number_format($dis['total_saluran'], 2, ',', '.');  ?>
                                </td>
                                <td>
                                    <?php
                                    if ($dis['id_user'] == $user['id']) {
                                    ?>
                                        <a data-toggle="modal" data-target="#mandist<?= $dis['id_dis'] ?>" class=" btn btn-outline-info btn-sm h6"> <b><?= $dis['total_penerima']; ?></b><span class="ml-1">Penerima</span></a>
                                    <?php
                                    } else { ?>
                                        <a data-toggle="modal" data-target="#bukanData" class=" btn btn-outline-info btn-sm h6"> <b><?= $dis['total_penerima']; ?></b><span class="ml-1">Penerima</span></a>
                                    <?php } ?>
                                </td>
                                <!-- <td>foto</td> -->


                                <td>

                                    <?php
                                    if ($dis['id_user'] == $user['id']) {
                                    ?>
                                        <a class="btn btn-outline-secondary btn-xs " data-toggle="modal" data-target="#lihatDistribusi<?= $dis['id_dis'] ?>"><i class=" fas fa-search"></i></a>
                                        <a class="btn btn-outline-secondary btn-xs mx-1" data-toggle="modal" data-target="#editDistribusi<?= $dis['id_dis'] ?>"><i class=" fas fa-edit"></i></a>
                                        <a class="btn btn-outline-secondary btn-xs" href="<?php echo base_url() . 'distribusiuser/hapus_distribusi/' . $dis['id_dis'] ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'><i class="fas fa-trash"></i></a>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-secondary btn-xs " data-toggle="modal" data-target="#lihatDistribusi<?= $dis['id_dis'] ?>"><i class=" fas fa-search"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>

                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>


</section>

<div class="modal fade" id="bukanData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">OPPSS..!!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="">Bukan Data Anda!</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDistribusi" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg " role="document">
        <div class="modal-content">

            <div class="modal-header bg-info text-light">
                <h5 class="modal-title" id="ModalLabel">Tambah Distribusi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form action="<?php echo base_url(); ?>distribusiuser/tambah_distribusi" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" rows="4" name="id_user" value="<?= $user['id']; ?>"></input>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputDescription">Lazismu</label>
                            <div class="input-group input-group-sm">
                                <input name="lazismu" class="form-control" rows="4" placeholder="Masukan Nama Lazismu..."></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Kegiatan</label>
                            <div class="input-group input-group-sm">
                                <textarea name="kegiatan" class="form-control" rows="4" placeholder="Masukan Nama Kegiatan..."></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori Program</label>
                            <div class="input-group input-group-sm">
                                <select class="form-control" name="program">
                                    <option>--Pilih Kategori Program--</option>
                                    <?php
                                    foreach ($program as $prog) { ?>
                                        <option value="<?= $prog['program'] ?>"><?= $prog['program'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori Dana</label>
                            <div class="input-group input-group-sm">
                                <select class="form-control" name="dana">
                                    <option>--Pilih Kategori Dana--</option>
                                    <?php
                                    foreach ($dana as $d) { ?>
                                        <option value="<?= $d['dana'] ?>"><?= $d['dana'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kategori Asnaf</label>
                            <div class="input-group input-group-sm">


                                <select class=" form-control" name="asnaf" id="asnaf">
                                    <option>--Pilih Asnaf--</option>

                                    <?php
                                    foreach ($asnaf1 as $a) { ?>
                                        <option value="<?= $a['asnaf'] ?>"><?= $a['asnaf'] ?></option>

                                    <?php } ?>


                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Tanggal</label>
                            <div class="input-group input-group-sm">
                                <input name="tanggal" type="date" class="form-control" rows="4"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Total Disalurkan</label>
                            <div class="input-group input-group-sm">


                                <input type="text" class="form-control" rows="4" placeholder="Masukan total disalrkan..." name="total_saluran"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Total Penerima</label>
                            <div class="input-group input-group-sm">


                                <input type="text" class="form-control" rows="4" placeholder="Masukan total penerima..." name="total_penerima"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Estimasi Per Orang</label>
                            <div class="input-group input-group-sm">


                                <input type="text" class="form-control" rows="4" placeholder="Masukan estimasi peroran..." name="estimasi_orang"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Bentuk Bantuan</label>
                            <div class="input-group input-group-sm">


                                <input type="text" class="form-control" rows="4" placeholder="Masukan bentuk bantuan..." name="bentuk_bantuan"></input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Dokumentasi</label>
                            <div class="input-group input-group-sm">

                                <div class="custom-file input-group input-group-sm">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar">
                                    <label class="custom-file-label " for="inputGroupFile01">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Provinsi</label>
                            <div class="input-group input-group-sm">


                                <select class=" form-control form-control" name='provinsi' id="provinsi1">
                                    <option value='0'>--Pilih Provinsi--</option>

                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo "<option value='$prov[id_prov]'>$prov[prov]</option>";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                        <div class="form-group">

                            <label for="inputName">Kabupaten/Kota</label>
                            <div class="input-group input-group-sm">

                                <select class=" form-control form-control" name="kota" id="kota1">

                                    <option value='0'>--Pilih Kabupaten/Kota--</pilih>

                                </select>

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="inputName">Kecamatan</label>
                            <div class="input-group input-group-sm">

                                <select class=" form-control form-control" name="kecamatan" id="kecamatan1">

                                    <option value='0'>--Pilih Kecamatan--</pilih>

                                </select>

                            </div>

                        </div>
                        <div class="form-group">

                            <label for="inputName">Kelurahan/Desa</label>
                            <div class="input-group input-group-sm">

                                <select class=" form-control form-control" name="desa" id="desa1">

                                    <option value='0'>--Pilih Kelurahan/Desa--</pilih>

                                </select>

                            </div>

                        </div>
                    </div>

            </div>

            <div class="modal-footer ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>

</div>

<!-- Modal Selesai -->

<!-- Modal Edit Data -->

<?php foreach ($distribusi as $dis) {  ?>
    <div class="modal fade" id="editDistribusi<?= $dis['id_dis']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg " role="document">
            <div class="modal-content">

                <div class="modal-header bg-info text-light">
                    <h5 class="modal-title" id="ModalLabel">Edit Distribusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="<?php echo base_url(); ?>distribusiuser/edit_distribusi" method="post" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id_dis" value="<?= $dis['id_dis'] ?>">
                                <label for="inputDescription">Lazismu</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="lazismu" class="form-control" rows="4" placeholder="Masukan Nama lazismu..." value="<?= $dis['lazismu'] ?>"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id_dis" value="<?= $dis['id_dis'] ?>">
                                <label for="inputDescription">Kegiatan</label>
                                <div class="input-group input-group-sm">
                                    <textarea name="kegiatan" class="form-control" rows="4" placeholder="Masukan Nama Kegiatan..."><?= $dis['kegiatan'] ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Program</label>
                                <div class="input-group input-group-sm">
                                    <select class="form-control" name="program">
                                        <option value="<?= $dis['program'] ?>"><?= $dis['program'] ?></option>
                                        <?php
                                        foreach ($program as $prog) { ?>
                                            <option value="<?= $prog['program'] ?>"><?= $prog['program'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Dana</label>
                                <div class="input-group input-group-sm">
                                    <select class="form-control" name="dana">
                                        <option value="<?= $dis['dana'] ?>"><?= $dis['dana'] ?></option>
                                        <?php
                                        foreach ($dana as $d) { ?>
                                            <option value="<?= $d['dana'] ?>"><?= $d['dana'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori Asnaf</label>
                                <div class="input-group input-group-sm">


                                    <select class=" form-control" name="asnaf" id="asnaf">
                                        <option value="<?= $dis['asnaf'] ?>"><?= $dis['asnaf'] ?></option>

                                        <?php
                                        foreach ($asnaf1 as $a) { ?>
                                            <option value="<?= $a['asnaf'] ?>"><?= $a['asnaf'] ?></option>

                                        <?php } ?>


                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Tanggal</label>
                                <div class="input-group input-group-sm">
                                    <input name="tanggal" type="date" class="form-control" rows="4" value="<?= $dis['tanggal'] ?>"></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Total Disalurkan</label>
                                <div class="input-group input-group-sm">


                                    <input type="text" class="form-control" rows="4" placeholder="Masukan total disalrkan..." name="total_saluran" value="<?= $dis['total_saluran'] ?>"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Total Penerima</label>
                                <div class="input-group input-group-sm">


                                    <input type="text" class="form-control" rows="4" placeholder="Masukan total penerima..." name="total_penerima" value="<?= $dis['total_penerima'] ?>"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Estimasi Per Orang</label>
                                <div class="input-group input-group-sm">

                                    <input type="text" class="form-control" rows="4" placeholder="Masukan estimasi peroran..." name="estimasi_orang" value="<?= $dis['estimasi_orang'] ?>"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Bentuk Bantuan</label>
                                <div class="input-group input-group-sm">


                                    <input type="text" class="form-control" rows="4" placeholder="Masukan bentuk bantuan..." name="bentuk_bantuan" value="<?= $dis['bentuk_bantuan'] ?>"></input>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDescription">Dokumentasi</label>
                                <div class="row">
                                    <div class="col-4">
                                        <img class="rounded" width="100%" src="<?= base_url('uploads/' . $dis['gambar']); ?>" alt="Tidak Ada!">

                                    </div>
                                    <div class="col-8">
                                        <div class="input-group input-group-sm">

                                            <div class="custom-file input-group input-group-sm">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar">
                                                <label class="custom-file-label " for="inputGroupFile01"><?= $dis['gambar'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Provinsi</label>
                                <div class="input-group input-group-sm">


                                    <select class=" form-control form-control" name='provinsi' id="provinsi2">
                                        <option value='<?= $dis['id_prov'] ?>'><?= $dis['prov'] ?></option>

                                        <?php
                                        foreach ($provinsi as $prov) {
                                            echo "<option value='$prov[id_prov]'>$prov[prov]</option>";
                                        }
                                        ?>

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">

                                <label for="inputName">Kabupaten/Kota</label>
                                <div class="input-group input-group-sm">

                                    <select class=" form-control form-control" name="kota" id="kota2">

                                        <option value='<?= $dis['id_kota'] ?>'><?= $dis['kota'] ?></pilih>

                                    </select>

                                </div>

                            </div>
                            <div class="form-group">

                                <label for="inputName">Kecamatan</label>
                                <div class="input-group input-group-sm">

                                    <select class=" form-control form-control" name="kecamatan" id="kecamatan2">

                                        <option value='<?= $dis['id_kec'] ?>'><?= $dis['kec'] ?></pilih>

                                    </select>

                                </div>

                            </div>
                            <div class="form-group">

                                <label for="inputName">Kelurahan/Desa</label>
                                <div class="input-group input-group-sm">

                                    <select class=" form-control form-control" name="desa" id="desa2">

                                        <option value='<?= $dis['id_desa'] ?>'><?= $dis['desa'] ?></pilih>

                                    </select>

                                </div>

                            </div>
                        </div>

                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>
<?php } ?>
<!-- Modal Selesai -->

<?php foreach ($distribusi as $dis) {  ?>
    <!-- Modal Detail distribusi -->
    <div class="modal fade" id="lihatDistribusi<?= $dis['id_dis'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Detail Distribusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-info text-light">
                                    Detail Kegiatan
                                </div>
                                <div class="card-body">

                                    <h6><b>Kegiatan</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['kegiatan'] ?></h6>

                                    <h6><b>Tanggal</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['tanggal'] ?></h6>

                                    <h6><b>Kab/Kota</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['kota'] ?></h6>

                                    <h6><b>Kecamatan</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['kec'] ?></h6>

                                    <h6><b>Ketegori Kegiatan</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['program'] ?></h6>

                                    <h6><b>Kategori Dana</b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['dana'] ?></h6>

                                    <h6><b>Total Di Salurkan </b></h6>
                                    <h6 class="blockquote-footer"> <span class="mr-1">Rp</span>

                                        <?= number_format($dis['total_saluran'], 2, ',', '.');  ?></h6>

                                    <h6><b>Bentuk Realisasi </b></h6>
                                    <h6 class="blockquote-footer"><?= $dis['bentuk_bantuan'] ?></h6>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-info text-light">
                                    Foto Kegiatan
                                </div>
                                <div class="card-body">
                                    <img class="rounded" width="100%" src="<?= base_url('uploads/' . $dis['gambar']); ?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-info text-light">
                                    Penerima Bantuan
                                </div>
                                <div class="card-body">
                                    <?php

                                    $idd = $dis['id_dis'];

                                    $CI = &get_instance();
                                    $CI->load->model('distribusi_m');
                                    $result = $CI->distribusi_m->mandist($idd);

                                    $no = 1;
                                    foreach ($result as $md) {
                                    ?>
                                        <h6 class="blockquote-footer"><?= $md['nama_manfaat']; ?></h6>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<?php

foreach ($distribusi as $dis) { ?>


    <div class="modal fade" id="mandist<?= $dis['id_dis'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header bg-info text-light">
                    <h5 class="modal-title" id="ModalLabel">Penerima</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('distribusiuser/mandist_update') ?>" method="POST">

                        <a href="" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal" data-target="#tambahMandist<?= $dis['id_dis'] ?>"> <i class="fas fa-plus-circle" id="tombolTambah"></i> <span class="ml-1">Tambah</span> </a>
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="bg-info">
                                <tr>
                                    <th>No</th>
                                    <!-- <th>Kategori</th> -->
                                    <th>Penerima</th>

                                    <th>Nilai Donasi</th>
                                    <th>Bentuk Donasi</th>

                                    <th style="width: 8%;">Aksi</th>

                                </tr>
                            </thead>
                            <tbody id="show_data">

                                <?php

                                $idd = $dis['id_dis'];

                                $CI = &get_instance();
                                $CI->load->model('distribusi_m');
                                $result = $CI->distribusi_m->mandist($idd);



                                // $query = $this->db->get_where('tb_mandist', ['id_distribusi' => $idd])->result_array();


                                // $sql = "SELECT * FROM tb_mandist WHERE id_dsitribusi='$idd'";
                                // $query = $this->db->query($sql)->result_array();

                                $no = 1;
                                foreach ($result as $md) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <!-- <td><?= $md['kategori_manfaat']; ?></td> -->
                                        <td><?= $md['nama_manfaat']; ?></td>

                                        <td>

                                            <div class="form-group">

                                                <input type="hidden" name="id_mandist[]" value="<?= $md['id_mandist'] ?>" id="">



                                                <input type="number" class="form-control" name="nilai_donasi[]" value="<?= $md['nilai_donasi'] ?>">

                                            </div>


                                        </td>
                                        <td>

                                            <div class="form-group">

                                                <input type="text" class="form-control" name="bentuk_donasi[]" value=" <?= $md['bentuk_donasi'] ?>">

                                            </div>


                                        </td>


                                        <td>

                                            <a class="btn btn-outline-secondary btn-xs" href="<?php echo base_url() . 'distribusiuser/hapus_mandist/' . $md['id_mandist'] ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>

                        </table>

                        <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-save"></i> Simpan</button>
                        <div></div>

                    </form>
                </div>
                <div class="modal-footer bg-info">

                </div>
            </div>
        </div>
    </div>



<?php } ?>

<?php

foreach ($distribusi as $dis) { ?>



    <div class="modal fade" id="tambahMandist<?= $dis['id_dis'] ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl " role="document">
            <div class="modal-content">



                <div class="modal-header bg-info text-light">
                    <h5 class="modal-title" id="ModalLabel">Tambah Distribusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?= base_url('distribusiuser/tambahMandist') ?>" method="POST">

                        <div class="card-body">
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-outline-info">Simpan</button>

                            </div>
                            <table id="" class="table table-bordered table-striped">
                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Sumber Dana</th>
                                        <th>Kategori</th>

                                        <th>Nama</th>
                                        <th>NIK</th>

                                        <th>Alamat</th>

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
                                            <td>
                                                <?php if ($m['m_nik_lembaga'] != null) { ?>
                                                    <?= $m['nama_lembaga'] ?><br>
                                                    <p><small class="text-info"><?= $m['nama_manfaat'] ?></small></p>

                                                <?php } else { ?>
                                                    <?= $m['nama_manfaat'] ?>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($m['nik'] != null) {
                                                    echo $m['nik'];
                                                } elseif ($m['m_nik_keluarga'] != null) {
                                                    echo $m['m_nik_keluarga'];
                                                } elseif ($m['m_nik_lembaga'] != null) {
                                                    echo $m['m_nik_lembaga'];
                                                } ?>
                                            </td>


                                            <td> <?= $m['alamat'] ?></td>
                                            <!-- <td>Bantuan</td> -->
                                            <td>

                                                <input type="hidden" name="id_distribusi[]" value=" <?php echo $dis['id_dis'] ?>" id="">

                                                <input type="checkbox" name="id_manfaat[]" value=" <?= $m['id_manfaat'] ?>" id="">
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>

                            </table>
                        </div>

                    </form>
                </div>


            </div>
        </div>

    </div>
<?php } ?>