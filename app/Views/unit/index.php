<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>List Unit </h2>
                <?php if (session()->get('role_id') == 2) : ?>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahunit"><i class="fas fa-user-plus"></i> Add Unit</button>
                <?php endif; ?>
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
                                    <th>Unit</th>
                                    <?php if (session()->get('role_id') == 2) :  ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataunits as $u) : ?>
                                    <tr>
                                        <td>
                                            <?= $u['units']; ?>
                                        </td>
                                        <td>
                                            <?php if (session()->get('role_id') == 2) : ?>
                                                <a href="<?= base_url(); ?>/unit/updateUnit/<?= $u['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataUnit<?= $u['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                                <a href="<?= base_url(); ?>/unit/deleteUnit/<?= $u['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
                                            <?php endif; ?>
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
<div class="modal fade" id="tambahunit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="form-group col-md-12">
                        <label for="nama">Nama Unit</label>
                        <input type="text" class="form-control" id="namaunit" placeholder="Masukkan Nama Unit...">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tombol-add-unit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add User -->

<!-- Update User -->
<?php foreach ($dataunits as $du) : ?>
    <div class="modal fade" id="UbahDataUnit<?= $du['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/unit/updateUnit/<?= $du['id']; ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama">Nama Unit</label>
                                <input type="text" class="form-control" id="namaunit" name="namaunit" value="<?= $du['units']; ?>">
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