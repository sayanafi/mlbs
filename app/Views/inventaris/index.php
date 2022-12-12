<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>List Inventaris </h2>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahinventaris"><i class="fas fa-user-plus"></i> Add Inventaris</button>
                <p class="lead"></p>

            </div>

        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Merk</th>
                                    <th>Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Score</th>
                                    <th>Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datainventaris as $dv) : ?>
                                    <tr>
                                        <td><?= $dv['nama_barang']; ?></td>
                                        <td>
                                            <button class="badge badge-dark"><?= $dv['kode_barang']; ?></button>
                                        </td>
                                        <td><?= $dv['merk']; ?></td>
                                        <td><?= $dv['bahan']; ?></td>
                                        <td><?= $dv['jumlah']; ?></td>
                                        <td><?= $dv['score']; ?></td>
                                        <td>
                                            <button class="badge badge-primary"><?= $dv['units']; ?></button>
                                        </td>

                                        <td>
                                            <?php if (session()->get('role_id') == 2) { ?>
                                                <a href="<?= base_url(); ?>/inventaris/updateInventaris/<?= $dv['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataInventaris<?= $dv['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>/inventaris/deleteInventaris/<?= $dv['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url(); ?>/inventaris/actionInventaris/<?= $dv['id']; ?>" class="badge badge-warning" data-toggle="modal" data-target="#NilaiInventaris<?= $dv['id']; ?>"><i class="fa fas fa-edit"></i> Score</a>
                                            <?php } ?>
                                        </td>
                                    </tr>

                            </tbody>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>

<!-- Add User -->
<div class="modal fade" id="tambahinventaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="namabarang" placeholder="Masukkan Nama Barang...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">Kode Barang</label>
                        <input type="text" class="form-control" id="kodebarang" placeholder="Masukkan Kode Barang...">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Merk</label>
                        <input type="text" class="form-control" id="merk" placeholder="Masukkan Merk...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Bahan</label>
                        <input type="text" class="form-control" id="bahan" placeholder="Masukkan Bahan...">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="password">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" placeholder="Masukkan Jumlah...">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Score</label>
                        <input type="text" class="form-control" id="score" placeholder="Masukkan Score...">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Pilih Units...</label>
                        <select class="form-control" aria-label="Default select example" id="units">
                            <?php foreach ($dataunits as $du) : ?>
                                <option value="<?= $du['id']; ?>"><?= $du['units']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tombol-add-inventaris">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add User -->

<!-- Update User -->
<?php foreach ($datainventaris as $dv) : ?>
    <div class="modal fade" id="UbahDataInventaris<?= $dv['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/inventaris/updateInventaris/<?= $dv['id']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Barang</label>
                                <input type="text" class="form-control" name="namabarang" id="namabarang" value="<?= $dv['nama_barang']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">Kode Barang</label>
                                <input type="text" class="form-control" name="kodebarang" id="kodebarang" value="<?= $dv['kode_barang']; ?>">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Merk</label>
                                <input type="text" class="form-control" name="merk" id="merk" value="<?= $dv['merk']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Bahan</label>
                                <input type="text" class="form-control" name="bahan" id="bahan" placeholder="Masukkan Bahan...">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="password">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $dv['jumlah']; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Pilih Units...</label>
                                <select class="form-control" aria-label="Default select example" name="units" id="units">
                                    <option value="<?= $dv['unit_id']; ?>"><?= $dv['units']; ?></option>
                                    <?php foreach ($dataunits as $du) : ?>
                                        <option value="<?= $du['id']; ?>"><?= $du['units']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datainventaris as $dv) : ?>
    <div class="modal fade" id="NilaiInventaris<?= $dv['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/inventaris/nilaiInventaris/<?= $dv['id']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nilai Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-row">


                            <div class="form-group col-md-12">
                                <label>Score</label>
                                <select class="form-control" aria-label="Default select example" name="score" id="score">
                                    <option selected value="<?= $dv['score']; ?>"><?= $dv['score']; ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- End Update User -->


<?= $this->endSection(); ?>