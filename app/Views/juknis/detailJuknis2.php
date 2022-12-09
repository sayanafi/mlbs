<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>Detail <?= $juknis; ?> </h2>

                <a href="<?= base_url(); ?>/juknis" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-backward"></i>
                    Kembali Ke List Juknis</a>
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
                                    <th>Prosedur Tetap</th>
                                    <th>Sikap</th>
                                    <th>Ucapan</th>
                                    <th>Pelaksana</th>
                                    <th>Persyaratan</th>
                                    <th>Waktu</th>
                                    <th>Output</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detailjuknis as $dj) : ?>
                                    <tr>
                                        <td><?= $dj['prosedur_tetap']; ?></td>
                                        <td><?= $dj['sikap']; ?></td>
                                        <td><?= $dj['ucapan']; ?></td>
                                        <td><?= $dj['pelaksana']; ?></td>

                                        <td><?= $dj['persyaratan_perlengkapan']; ?></td>
                                        <td><?= $dj['waktu']; ?></td>
                                        <td><?= $dj['output']; ?></td>

                                        <td>
                                            <a href="<?= base_url(); ?>/juknis/deleteDetailJuknis/<?= $dj['id']; ?>" class="badge badge-danger tombol-hapus"><i class="fa fas fa-trash"></i></a>
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





<?= $this->endSection(); ?>