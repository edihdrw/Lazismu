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

                            <select class="form-control form-control" id="tahunAsnaf">

                                <option value="0">Semua</option>
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
                        <div class="card">
                            <div class="card-body">
                                <table id="dAsnaf" class="table table-bordered table-striped">
                                    <thead class="bg-info text-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Asnaf</th>
                                            <th>Pendistribusian (Rp.)</th>

                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>

                                    </tfoot>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>

<script>

</script>