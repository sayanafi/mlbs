<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>Standar Pelayan </h2>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahsp"><i class="fas fa-user-plus"></i> Add Standar Pelayanan</button>
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
                                    <th>Nama Dokumen</th>
                                    <th>Unit</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datastandarpelayanan as $dsp) : ?>
                                    <tr>
                                        <td><?= $dsp['nama_dokumensp']; ?></td>
                                        <td><?= $dsp['units']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>/standarpelayanan/download/<?= $dsp['id']; ?>" class="badge badge-primary">View File </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url(); ?>/standarpelayanan/updateSP/<?= $dsp['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataSp<?= $dsp['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/standarpelayanan/deleteSP/<?= $dsp['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>/standarpelayanan/addSP" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Nama Dokumen</label>
                            <input type="namadokumen" class="form-control" id="namadokumen" name="namadokumen" placeholder="Masukkan Nama Dokumen..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">File Dokumen</label>
                            <input type="file" class="form-control" id="filedokumen" name="filedokumen">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pilih Units...</label>
                            <select class="form-control" aria-label="Default select example" id="units" name="units">
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
<!-- End Add User -->

<!-- Update SP -->
<?php foreach ($datastandarpelayanan as $dsp) : ?>
    <div class="modal fade" id="UbahDataSp<?= $dsp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/standarpelayanan/updateSP/<?= $dsp['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">Nama Dokumen</label>
                                <input type="namadokumen" class="form-control" id="namadokumen" name="namadokumen" value="<?= $dsp['nama_dokumensp']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">File Dokumen</label>
                                <input type="file" class="form-control" id="filedokumen" name="filedokumen" value="<?= $dsp['file_dokumensp']; ?>">
                                <input type="hidden" name="filedokumenlama" id="fileLama" value="<?= $dsp['file_dokumensp']; ?>">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Pilih Units...</label>
                                <select class="form-control" aria-label="Default select example" id="units" name="units">
                                    <option value="<?= $dsp['unit_id']; ?>"><?= $dsp['units']; ?></option>
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
<!-- End Update SP -->


<?= $this->endSection(); ?>