<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>List SPO </h2>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahspo"><i class="fas fa-user-plus"></i> Add SPO</button>
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
                                    <th>Nama SPO</th>
                                    <th>No SPO</th>
                                    <th>User Upload</th>
                                    <th>Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataspo as $ds) : ?>
                                    <tr>
                                        <td><?= $ds['nama_spo']; ?></td>
                                        <td><?= $ds['units']; ?></td>
                                        <td>
                                            <button class="badge badge-dark"><?= $ds['nama']; ?></button>
                                        </td>
                                        <td>
                                            <?= $ds['no_spo']; ?>
                                        </td>

                                        <td>
                                            <a href="<?= base_url(); ?>/SPO/updateSPO/<?= $ds['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataSPO<?= $ds['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/SPO/deleteSPO/<?= $ds['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahspo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="nama">Nama SPO</label>
                        <input type="text" class="form-control" id="namaspo" placeholder="Masukkan Nama SPO...">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="username">No SPO</label>
                        <input type="text" class="form-control" id="nospo" placeholder="Masukkan No SPO...">
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
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
                <button type="button" class="btn btn-primary tombol-add-spo">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add User -->

<!-- Update User -->
<?php foreach ($dataspo as $ds) : ?>
    <div class="modal fade" id="UbahDataSPO<?= $ds['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/spo/updateSPO/<?= $ds['id']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama SPO</label>
                                <input type="text" class="form-control" id="nama" name="namaspo" value="<?= $ds['nama_spo']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="username">No SPO</label>
                                <input type="text" class="form-control" id="username" name="nospo" value="<?= $ds['no_spo']; ?>"">
                            </div>

                        </div>

                        <div class=" form-row">
                                <div class="form-group col-md-6">
                                    <label>Pilih Units...</label>
                                    <select class="form-control" aria-label="Default select example" name="units" id="units">
                                        <option value="<?= $ds['unit_id']; ?>"><?= $ds['units']; ?></option>
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
<!-- End Update User -->


<?= $this->endSection(); ?>