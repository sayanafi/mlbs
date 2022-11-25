<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>List Juknis </h2>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahjuknis"><i class="fas fa-user-plus"></i> Add Juknis</button>
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
                                    <th>Nama Juknis</th>
                                    <th>No Juknis</th>
                                    <th>Unit</th>
                                    <th>User</th>
                                    <th>Data Created</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datajuknis as $dj) : ?>
                                    <tr>
                                        <td><?= $dj['nama_juknis']; ?></td>
                                        <td>
                                            <button class="badge badge-dark"><?= $dj['no_juknis']; ?></button>
                                        </td>
                                        <td><?= $dj['unit_pihakterkait']; ?></td>
                                        <td>Aqil</td>
                                        <td><?= $dj['tanggal_dibuat']; ?></td>

                                        <td>
                                            <a href="<?= base_url(); ?>/juknis/updateJuknis/<?= $dj['id']; ?>" class="badge badge-info" data-toggle="modal" data-target="#UbahDataJuknis<?= $dj['id']; ?>"><i class="fa fas fa-edit"></i></a>
                                            <a href="<?= base_url(); ?>/juknis/deleteJuknis/<?= $dj['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
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
<div class="modal fade" id="tambahjuknis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>/juknis/addJuknis" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Juknis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nama">Nama Juknis</label>
                            <input type="text" class="form-control" name="namajuknis" id="namajuknis" placeholder="Masukkan Nama Juknis...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nojuknis">No Juknis</label>
                            <input type="text" class="form-control" name="nojuknis" id="nojuknis" placeholder="Masukkan No Juknis...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tanggaldibuat">Tanggal Dibuat</label>
                            <input type="date" class="form-control" name="tanggaldibuat" id="tanggaldibuat">
                        </div>

                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-4">
                            <label for="tanggaldisahkan">Tanggal Disahkan</label>
                            <input type="date" class="form-control" name="tanggaldisahkan" id="tanggaldisahkan">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pengertian">Pengertian</label>
                            <textarea class="form-control" name="pengertian" id="pengertian"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tujuan">Tujuan</label>
                            <textarea class="form-control" name="tujuan" id="tujuan"></textarea>
                        </div>

                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-4">
                            <label for="dasarhukum">Dasar Hukum</label>
                            <textarea class="form-control" name="dasarhukum" id="dasarhukum"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kebijakanketentuan">Kebijakan / Ketentuan</label>
                            <textarea class="form-control" name="kebijakanketentuan" id="kebijakanketentuan"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kebijakanketentuan">Unit / Pihak Terkait</label>
                            <textarea class="form-control" name="unitpihakterkait" id="unitpihakterkait"></textarea>
                        </div>

                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="catatan ">Catatan</label>
                            <textarea class="form-control" name="catatan" id="catatan"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">File Dokumen</label>
                            <input type="file" class="form-control" id="filejuknis" name="filejuknis">

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

<?php foreach ($datajuknis as $dj) : ?>
    <div class="modal fade" id="UbahDataJuknis<?= $dj['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url(); ?>/juknis/updateJuknis/<?= $dj['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Juknis</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nama">Nama Juknis</label>
                                <input type="text" class="form-control" name="namajuknis" id="namajuknis" value="<?= $dj['nama_juknis']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nojuknis">No Juknis</label>
                                <input type="text" class="form-control" name="nojuknis" id="nojuknis" value="<?= $dj['no_juknis']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tanggaldibuat">Tanggal Dibuat</label>
                                <input type="date" class="form-control" name="tanggaldibuat" id="tanggaldibuat" value="<?= $dj['tanggal_dibuat']; ?>">
                            </div>

                        </div>
                        <div class=" form-row">
                            <div class="form-group col-md-4">
                                <label for="tanggaldisahkan">Tanggal Disahkan</label>
                                <input type="date" class="form-control" name="tanggaldisahkan" id="tanggaldisahkan" value="<?= $dj['tanggal_disahkan']; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pengertian">Pengertian</label>
                                <textarea class="form-control" name="pengertian" id="pengertian"><?= $dj['pengertian']; ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pengertian">Tujuan</label>
                                <textarea class="form-control" name="tujuan" id="tujuan"><?= $dj['tujuan']; ?></textarea>
                            </div>

                        </div>
                        <div class=" form-row">
                            <div class="form-group col-md-4">
                                <label for="dasarhukum">Dasar Hukum</label>
                                <textarea class="form-control" name="dasarhukum" id="dasarhukum"><?= $dj['dasar_hukum']; ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kebijakanketentuan">Kebijakan / Ketentuan</label>
                                <textarea class="form-control" name="kebijakanketentuan" id="kebijakanketentuan"><?= $dj['kebijakan_ketentuan']; ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="kebijakanketentuan">Unit / Pihak Terkait</label>
                                <textarea class="form-control" name="unitpihakterkait" id="unitpihakterkait"><?= $dj['unit_pihakterkait']; ?></textarea>
                            </div>

                        </div>
                        <div class=" form-row">
                            <div class="form-group col-md-6">
                                <label for="catatan ">Catatan</label>
                                <textarea class="form-control" name="catatan" id="catatan"><?= $dj['catatan']; ?></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">File Dokumen</label>
                                <input type="file" class="form-control" id="filejuknis" name="filejuknis" value="<?= $dj['file_juknis']; ?>">
                                <input type="hidden" name="filejuknislama" value="<?= $dj['file_juknis']; ?>">
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



<?= $this->endSection(); ?>