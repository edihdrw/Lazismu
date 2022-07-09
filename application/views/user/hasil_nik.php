<section class="content">
    <div class="container-fluid">

        <div class="card">
            <h5 class="card-header">Hasil Pencaraian</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img class="" style="width: 100%; height:max-content;" src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/06/05/224254518.jpg" alt="">
                    </div>
                    <div class="col-8">

                        <div class="mx-2">
                            <?php if ($nik->m_nik_lembaga) { ?>
                                <h6 class="text-info"><?= $nik->kategori ?><span class="mx-1"></span><mark class="bg-info"><?= $nik->nama_lembaga ?></mark></h6>

                            <?php } else { ?>
                                <h6 class="text-info"><?= $nik->kategori ?></h6>
                            <?php } ?>


                            <h4><b><?= $nik->nama_manfaat ?></b></h4>
                            <h6 class="font-italic">
                                <?php
                                if ($nik->nik != NULL) {
                                    echo $nik->nik;
                                } elseif ($nik->m_nik_keluarga != NULL) {
                                    echo $nik->m_nik_keluarga;
                                } elseif ($nik->m_nik_lembaga != NULL) {
                                    echo $nik->m_nik_lembaga;
                                } ?>
                            </h6>
                            <hr class="bg-info">



                            <h6><b>Alamat</b></h6>
                            <h6 class="font-weight-light"><?= $nik->alamat ?></h6>


                            <h6><b>Desa</b></h6>
                            <h6 class="font-weight-light"><?= $nik->desa ?></h6>

                            <h6><b>Kesamatan</b></h6>
                            <h6 class="font-weight-light"><?= $nik->kec ?></h6>

                            <h6><b>Kabupaten/Kota</b></h6>
                            <h6 class="font-weight-light"><?= $nik->kota ?></h6>

                            <h6><b>Provinsi</b></h6>
                            <h6 class="font-weight-light"><?= $nik->prov ?></h6>

                            <h6><b>No HP</b></h6>
                            <h6 class="font-weight-light"><?= $nik->hp ?></h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>