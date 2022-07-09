<section class="content">
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-5 offset-md-2 mx-auto d-block">
                <img src="https://sukasari.bandung.go.id/wp-content/uploads/2018/11/ktp-elektronik.png" class="mx-auto d-block my-5" alt="ktp" width="300">
                <form action="<?= base_url('nikuser/cari_nik') ?>" method="post">

                    <div class="input-group">

                        <input type="search" name="nik" class="form-control form-control-lg" placeholder="Masukan NIK">
                    </div>
                    <button type="submit" class="btn btn-success mx-auto d-block my-3">Tampilkan Data</button>
                </form>
                <p class="login-box-msg"> <?= $this->session->flashdata('message'); ?></p>
            </div>
        </div>
    </div>
</section>