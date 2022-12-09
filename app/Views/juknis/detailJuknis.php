<?= $this->extend('partials/index'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">

    <div class="user" data-user="<?= session()->getFlashdata('user'); ?>"></div>
    <div class="row">
        <div class="col-lg-11 col-xl-10">
            <div class="page-header">
                <h2>Detail Juknis </h2>

                <a href="<?= base_url(); ?>/juknis" class="btn btn-primary btn-sm"><i class="fas fa-solid fa-backward"></i>
                    Kembali Ke Juknis</a>
                <p class="lead"></p>



            </div>

        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">

                    <form class="formdetailjuknis" action="<?= base_url(); ?>/juknis/addDetailJuknis" method="POST">
                        <table class="table table-sm table-bordered">
                            <button type="submit" class="btn btn-primary btn-add-detailjuknis">Save Data</button>
                            <hr>
                            <label>Pilih Juknis...</label>
                            <select class="form-control" aria-label="Default select example" name="juknis" id="juknis">
                                <?php foreach ($juknis as $j) : ?>
                                    <option value="<?= $j['id']; ?>"><?= $j['nama_juknis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <thead>
                                <th>Prosedur Tetap</th>
                                <th>Sikap</th>
                                <th>Ucapan</th>
                                <th>Pelaksana</th>
                                <th>Persayaratan / Perlengkapan</th>
                                <th>Waktu</th>
                                <th>Output</th>
                                <th>#</th>
                            </thead>

                            <tbody class="formtambah">
                                <tr>

                                    <td>
                                        <input type="text" name="prosedurtetap[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="sikap[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="ucapan[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="pelaksana[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="persyaratanperlengkapan[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="waktu[]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="output[]" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="badge badge-primary btn-add-form"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>


</div>





<?= $this->endSection(); ?>