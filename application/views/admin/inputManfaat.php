<section class="content">
    <div class="container-fluid">
        <div class="card card-warning">

            <!-- /.card-header -->
            <div class="card-body">
                <p class="login-box-msg"> <?= $this->session->flashdata('message'); ?></p>

                <small class="text-danger"><?= form_error('kk'); ?></small>
                <form method="post" action="<?php echo base_url(); ?>manfaatadmin/tambah_manfaat">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sumber Dana</label>
                                <input name="sumber" type="text" class="form-control" placeholder="Masukan Sumber Dana ..." required>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Asnaf</label>
                                <select class="form-control" name="asnaf">
                                    <option>--Pilih--</option>
                                    <?php
                                    foreach ($asnaf as $asnaf) {
                                        echo "<option value='$asnaf[asnaf]'>$asnaf[asnaf]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    <option>--Pilih--</option>
                                    <?php
                                    foreach ($kategori as $kategori) {
                                        echo "<option value='$kategori[id]'>$kategori[kategori]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="fon-group" id="formjiwa">

                            </div>


                        </div>




                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control" name="provinsi" id="provinsi">
                                    <option value='0'>--pilih--</option>

                                    <?php
                                    foreach ($provinsi as $prov) {
                                        echo "<option value='$prov[id_prov]'>$prov[prov]</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select class="form-control" name="kota" id="kota">
                                    <option>--Pilih--</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option>--Pilih--</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label>Kelurahan/Desa</label>
                                <select class="form-control" name="desa" id="desa">
                                    <option>--Pilih--</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" placeholder="Nama Jalan .."></textarea>
                            </div>

                            <button type="submit" style="width: 20%;" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> <span class="ml-1">Tambah</span>
                            </button>
                        </div>
                    </div>






                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>