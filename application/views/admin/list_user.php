<section class="content">
    <div class="container-fluid">

        <table id="distribusiTabel" class="table table-bordered table-hover">
            <p class="login-box-msg"> <?= $this->session->flashdata('message'); ?></p>
            <thead class="bg-info">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Daftar</th>
                    <th></th>


                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($daftarUser as $usr) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $usr['nama']; ?></td>
                        <td><?= $usr['email']; ?></td>
                        <td>
                            <?php if ($usr['role_id'] == 1) {
                                echo "Admin";
                            } else {
                                echo "Admin Cabang";
                            } ?>

                        </td>
                        <td><?= $usr['date_created']; ?></td>
                        <td>

                            <a class="btn btn-outline-secondary btn-xs" href="<?php echo base_url() . 'admin/hapus_user/' . $usr['id'] ?> " onClick='return confirm("Apakah anda yakin ingin menghapus data ini?")'><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                <?php } ?>

        </table>
    </div>
</section>