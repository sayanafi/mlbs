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
                                        <td><?= $dj['nama_barang']; ?></td>
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
                <button type="button" class="btn btn-primary tombol-add-juknis">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add User -->



<?= $this->endSection(); ?>