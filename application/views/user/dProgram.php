<section class="content">
    <div class="container-fluid">
        <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group input-group my-2 ">

                            <div class="input-group-prepend ">
                                <div class="input-group-text" style="width: 80px;">LAZ</div>
                            </div>

                            <select class="form-control form-control">

                                <option>--Pilih--</option>
                                <option>Small select</option>
                                <option>Small select</option>
                            </select>

                        </div>
                        <div class="input-group input-group mb-2">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Tahun</div>
                            </div>

                            <select class="form-control form-control" id="tahunProgram">

                                <option value="0">--Semua--</option>
                                <?php foreach ($tahun as $tahun) { ?>
                                    <option value="<?= $tahun['tahun']; ?>"><?= $tahun['tahun']; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <!-- <div class="input-group input-group mb-2">

                            <div class="input-group-prepend">
                                <div class="input-group-text" style="width: 80px;">Priode</div>
                            </div>

                            <select class="form-control form-control">

                                <option>--Pilih--</option>
                                <option>Small select</option>
                                <option>Small select</option>
                            </select>

                        </div> -->
                        <a href="" class="btn btn-success mt-1"><i class="fas fa-search"></i> <span class="ml-1">Cari</span></a>

                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <table id="dProgram" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Program </th>
                                        <th>Pendistribusian (Rp.)</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- <?php
                                            $no = 1;
                                            $total = 0;
                                            foreach ($program as $prog) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $prog['program'] ?></td>
                                            <td>

                                                <?php
                                                $total_saluran = 0;

                                                foreach ($distribusi as $dis) {


                                                    if ($prog['program'] == $dis['program']) {

                                                        $totalProg = $dis['total_saluran'];
                                                        $total_saluran += $totalProg;
                                                    }
                                                }
                                                $total += $total_saluran; ?>


                                                <span class="mr-1">Rp</span>

                                                <?php echo number_format($total_saluran, 2, ',', '.');


                                                ?>
                                            </td>

                                        </tr>

                                    <?php } ?>
                                    <tr>

                                        <td colspan="2">Total</td>
                                        <td class="bg-success">

                                            <span class="mr-1">Rp</span>
                                            <?php

                                            echo number_format($total, 2, ',', '.');
                                            ?>
                                        </td>


                                    </tr> -->

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>